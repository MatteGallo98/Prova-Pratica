<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function shoppingIndex()
    {
        return \Inertia\Inertia::render('X')->with([
            'prodotti'=> \App\Models\Shopping::get()
        ]);
    }

    public function index()
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

        $perPage= request('perPage') ? request('perPage') : 25;

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
        ->when(!request('search')&& !request('column'), function($order){
            $order->orderBy('created_at', 'DESC');
        })
        ->paginate($perPage)->withQueryString();

        return Inertia::render('Index')->with([
            'products'=> $products,
            'perPage'=>$perPage
        ]);
    }

}
