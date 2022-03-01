<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

use App\Models\User;


use App\Models\Product;

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

        $perPage= request('perPage') ? request('perPage') : 2;

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
         
      
        return view('gest_orders')->with([
            'orders'=> $orders,
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

        $validated = $request->validate([
            'status' => 'required|string',
            'user_id' => 'required|integer',
            "product.*"  => "required|string",
            "amount.*"  => "nullable|integer|min:1",
        ]);
        
        $order= Order::create([
            'status' => $request->status,
            'user_id' => $request->user_id,
        ]);
        $products=$request->product;
        $i=0;
        $finalprice= 0.00;
        $finaldisprice=0.00;

        foreach($products as $product){
            if(isset($request->amount[$i])){
                $currentProd=Product::find($product);
                $finalprice+= $currentProd->cost*$request->amount[$i];
                $finaldisprice+=($currentProd->cost-($currentProd->cost * $currentProd->discount/100 )) * $request->amount[$i];

                $insertOrderProd= DB::table('order_product')->insert([
                'order_id'=> $order->id,
                'product_id'=>$product,
                'amount'=>$request->amount[$i]
                ]);
            }
           $i+=1;
        }

        Order::where('id', $order->id)->update([
            'final_price'=>$finalprice,
            'final_discount_price'=>$finaldisprice
        ]);

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
