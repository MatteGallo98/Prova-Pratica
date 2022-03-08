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
            'prezzo'=>'cost',
            'unitadimisura'=>'measure',
            'sconto'=>'discount',
            'data' => 'created_at'
        ];

        $perPage= request('perPage') ? request('perPage') : 25;
        $column = request('column') ? request('column') : 'data';
        $type = request('type') ? request('type') : 'ASC';
        $filter= request('filter') ? request('filter') : '';
        $search = request('search') ? request('search') : '';

        $products = Product::when(request('search'), function($query) {
            $query->where(
                'name', 'LIKE', '%'.request('search').'%'
            )
            ->orWhere(
                'description', 'LIKE', '%'.request('search').'%'
            );
        })
        ->when(request('filter'), function($query){
            $query->where(
                'PS', '=', request('filter')
            );
        })
        ->when(request('column'), function($query) use ($columnsHead) {
            $query->orderBy($columnsHead[request('column')], request('type'));
        })
        ->when(!request('search')&& !request('column'), function($order){
            $order->orderBy('created_at', 'DESC');
        })
        ->with('product_images')
        ->paginate($perPage)->withQueryString();

        return Inertia::render('Index')->with([
            'products'=> $products,
            'perPage'=>$perPage,
            'filter' => $filter,
            'column' => $column,
            'type' => $type,
            'search'=> $search
        ]);
    }

}
