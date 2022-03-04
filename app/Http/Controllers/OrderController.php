<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

use App\Models\User;


use App\Models\Product;

use Inertia\Inertia;

use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $perPage= request('perPage') ? request('perPage') : 5;
        $search = request('search') ? request('search') : '';

        $orders= Order::without('user')->join(
                'users', 'orders.user_id','=','users.id')->
            when(request('search'), function ($query){
            $query->whereHas('user', function($user) {
                $user->where('email', 'LIKE', '%'.request('search').'%');
            })
            ->orWhereHas('products', function($user) {
                $user->where('name', 'LIKE', '%'.request('search').'%');
            })
            ->orWhere('status', 'LIKE', '%'.request('search').'%');
        })
        ->when(request('column'), function($order){
            switch(request('column')){
                case 'email':
                    $order->orderBy('users.email', request('type'));
                    break;
                case 'data':
                    $order->orderBy('orders.created_at', request('type'));
                    break;
                case 'stato':
                    $order->orderBy('orders.status', request('type'));
                    break;
                case 'prezzo':
                    $order->orderBy('orders.final_price', request('type'));
                    break;
                case 'pfs':
                    $order->orderBy('orders.final_discount_price', request('type'));
                    break;
                default:
                    return $order;
            }
        })
        ->select('orders.*','users.email')
        ->paginate($perPage)->withQueryString();
         
      
        return Inertia::render('Gest_Table')->with([
            'data'=> [
                'orders'=> $orders,
                'perPage'=> $perPage,
                'mainRoute' => 'gest_ordini',
                'addRoute' => 'order.create',
                'columnsHead'=> [
                    'Email Utente'=>'email',
                    'Prodotti'=>'prod',
                    'Stato Ordine'=>'stato',
                    'Data ordine'=>'data',
                    'Prezzo Finale'=>'prezzo',
                    'Prezzo Finale Scontato' => 'pfs'
                ]
            ],
            'table_type'=> 'orders',
            'title' => 'Ordini',
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
        $users=User::get();
        $products=Product::get();

        return view('order')->with([
            'users'=>$users,
            'products'=>$products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
            'user_id' => 'required|integer',
            'product'=> 'required|array',
            'amount'=>  'required|array',
            "product.*"  => "required|integer|exists:\App\Models\Product,id",
            "amount.*"  => "nullable|integer|min:1",
        ]);
        
        $finalprice= 0.00;
        $finaldisprice=0.00;

        $products=collect($request->product)->filter(function ($product, $key) use ($request){
            return (int)$request->amount[$key];
        });

        $selectedProducts= Product::whereIn('id', $products)->get()->keyBy('id');

        $products= $products->map(function ( $product, $key) use ($request, &$finaldisprice, &$finalprice, $selectedProducts){
            $finalprice+= $selectedProducts[$product]->cost*$request->amount[$key];
            $finaldisprice+=($selectedProducts[$product]->cost-($selectedProducts[$product]->cost * $selectedProducts[$product]->discount/100 )) * $request->amount[$key];

            return [
                $product => ['amount'=> $request->amount[$key]]
            ];
        })->mapWithKeys(
            function ($product){
                return $product;
            }
        );

        $order= Order::create([
            'status' => $request->status,
            'user_id' => $request->user_id,
            'final_price'=>$finalprice,
            'final_discount_price'=>$finaldisprice
        ]);
       
        $order->products()->sync($products);

        return redirect()->route('gest_ordini');

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
        return view('order')->with('order', Order::where('id', $id)->first());
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
            'status'=> 'required|string'
        ]);

         $order_inf = [
            'status'=>$request->status
        ];

        Order::where('id', $id)->update($order_inf);

        return redirect()->route('gest_ordini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('id', $id)->firstorfail()->delete();
        echo ("Prodotto cancellato con successo.");
        return redirect()->route('gest_ordini');
    }
}
