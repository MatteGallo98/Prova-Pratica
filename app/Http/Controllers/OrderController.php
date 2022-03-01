<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

use App\Models\OrderProduct;

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

        $orders= Order::without('user')->when(request('search'), function ($query){
            $query->whereHas('user', function($user) {
                $user->where('email', 'LIKE', '%'.request('search').'%');
            })
            ->orWhereHas('products', function($user) {
                $user->where('name', 'LIKE', '%'.request('search').'%');
            })
            ->orWhere('status', 'LIKE', '%'.request('search').'%');
        })
        ->when(request('column'), function($order){
            $order->join(
                'users', 'orders.user_id','=','users.id'
            )->select('orders.*','users.email');

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
                default:
                    return $order;
            }
        })
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
