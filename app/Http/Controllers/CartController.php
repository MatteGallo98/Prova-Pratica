<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

use App\Models\User;


use App\Models\Product;

use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
       return Inertia::render('Cart');
    }

    public function store(Request $request){
       
        $request->validate([
            'status' => 'required|string',
            'user_id' => 'required|integer',
            'productsAmounts'=> 'required|array',
            /*'productsAmounts.*'=> 'required',
            "productsAmounts.*.amount"  => "required|integer|min:1",*/
            "finalprice" => "required||numeric",
            "finaldisprice"=> "required|numeric"
        ]);
        
        $order= Order::create([
            'status' => $request->status,
            'user_id' => $request->user_id,
            'final_price'=>$request->finalprice,
            'final_discount_price'=>$request->finaldisprice
        ]);

     
        $products= collect($request->productsAmounts)->mapWithKeys(
            function ($product){
                return $product;
            }
        );
       
        $order->products()->sync($products);

        return redirect()->route('userOrders',['id'=>$request->user_id]); 


    }
}
