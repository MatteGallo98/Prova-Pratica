<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('child')->with('products', Product::all());
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

   
}
