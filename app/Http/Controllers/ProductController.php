<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\Rule;

use App\Models\ProductImage;

use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $columnsHead = [
            'nome'=>'name',
            'descrizione'=>'description',
            'tipo'=>'PS',
            'disponibilita'=>'	availability',
            'costo'=>'cost',
            'unitadimisura'=>'measure',
            'sconto'=>'discount'
        ];

        $perPage= request('perPage') ? request('perPage') : 5;
        $search = request('search') ? request('search') : '';

        $products = Product::when(request('search'), function($query) {
            $query->where(
                'name', 'LIKE', '%'.request('search').'%'
            )
            ->orWhere(
                'description', 'LIKE', '%'.request('search').'%'
            );
        })
        ->when(request('column'), function($query) use ($columnsHead) {
            $query->orderBy($columnsHead[request('column')], request('type'));
        })
        ->paginate($perPage)->withQueryString();

        return Inertia::render('Gest_Table')->with([
            'data'=> [
                'products'=> $products,
                'perPage'=> $perPage,
                'mainRoute' => 'gest_prodotti',
                'addRoute' => 'product.create',
                'columnsHead'=> [
                    'Nome Prodotto/Servizio'=>'nome',
                    'Descrizione'=>'descrizione',
                    'Tipo'=>'tipo',
                    'Disponibilità'=>'dispobilita',
                    'Costo'=>'costo',
                    'Unita di misura'=>'unitadimisura',
                    'Sconto'=>'sconto'
                ]
            ],
            'table_type'=> 'products',
            'title' => 'Prodotti',
            'search'=> $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Add_Update_Product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            "PS" => 'nullable|boolean',
            "availability" => [
                Rule::requiredIf((int)$request->PS!==1)
            ],
            "cost" => 'required|regex:/^\d+(\.\d{1,2})?$/',
            "measure" => 'required|string',
            "discount" => 'nullable|integer',
            'images' => 'nullable|array',
            'images.*' => 'mimes:jpeg,bmp,png' 
        ]);
        
       $product= Product::create([
            'name' => $request->name,
            'description' => $request->description,
            "PS" => ($request->PS === "1" ? 1 : 0),
            "availability" => $request->availability,
            "cost" => $request->cost,
            "measure" => $request->measure,
            "discount" => $request->discount,
        ]);

        if($request->hasfile('images'))
         {
            foreach($request->file('images') as $image)
            {
                $image->store('public/images'); 
                
                ProductImage::create([
                    'name' => $image->getClientOriginalName(),
                    "file_path" => $image->hashName(),
                    'product_id'=> $product->id
                ]);
            }
        }

        return redirect()->route('gest_prodotti');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render('Add_Update_Product')->with('productUpdate', Product::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            "PS" => 'nullable|boolean',
            "availability" => [
                Rule::requiredIf((int)$request->PS!==1)
            ],
            "cost" => 'required|regex:/^\d+(\.\d{1,2})?$/',
            "measure" => 'required|string',
            "discount" => 'nullable|integer',
            'images' => 'nullable|array',
            'images.*' => 'mimes:jpeg,bmp,png' 
        ]);

         $product_inf = [
            'name' => $request->name,
            'description' => $request->description,
            "PS" => ($request->PS === "1" ? 1 : 0),
            "availability" => $request->availability,
            "cost" => $request->cost,
            "measure" => $request->measure,
            "discount" => $request->discount,
        ];

        Product::where('id', $id)->update($product_inf);

        return redirect()->route('gest_prodotti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $perPage)
    {
        Product::where('id', $id)->firstorfail()->delete();
        echo ("Prodotto cancellato con successo.");
        return redirect()->route('gest_prodotti', [
            'perPage'=> $perPage 
        ]);
    }
}
