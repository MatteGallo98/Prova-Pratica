<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage= request('perPage') ? request('perPage') : 2;
        if(request('search')){
            $products= Product::where(
                'name', 'LIKE', '%'.request('search').'%'
            )
            ->orWhere(
                'description', 'LIKE', '%'.request('search').'%'
            )
            ->paginate($perPage)->withQueryString();
        }
        elseif(request('column')){
            $products= Product::orderBy(request('column'), request('type'))
            ->paginate($perPage)->withQueryString();
        }
        else{
            $products= Product::paginate($perPage)->withQueryString();
        }
        return view('gest_products')->with([
            'products'=> $products,
            'perPage'=>$perPage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product');
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
            "discount" => 'nullable'
        ]);
        
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            "PS" => ($request->PS === "1" ? 1 : 0),
            "availability" => $request->availability,
            "cost" => $request->cost,
            "measure" => $request->measure,
            "discount" => $request->discount,
        ]);

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
        return view('product')->with('product', Product::where('id', $id)->first());
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
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            "PS" => 'nullable|boolean',
            "availability" => [
                Rule::requiredIf((int)$request->PS!==1)
            ],
            "cost" => 'required|regex:/^\d+(\.\d{1,2})?$/',
            "measure" => 'required|string',
            "discount" => 'nullable'
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
    public function destroy($id)
    {
        Product::where('id', $id)->firstorfail()->delete();
        echo ("Prodotto cancellato con successo.");
        return redirect()->route('gest_prodotti');
    }
}
