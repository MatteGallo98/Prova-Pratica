@extends('layouts.homepage')

@section('navbar')
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd!important;">
            <a class="navbar-brand brand" href="#">BuyMe</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                    @if (Route::has('login'))
                        <ul class="navbar-nav ml-auto login">
                            @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link underline me-auto">Dashboard</a>
                            </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link underline me-auto">Log in</a>
                                </li>
                            @endauth
                        </ul>
                    @endif
                </div>
        </nav>
@endsection

@section('productsList')
 @if($products)
   @foreach($products as $prod)
        @php
           $price = $prod->cost;
           $sconto = $prod->discount;
           $percDiscount= ((int)substr($sconto, 0, -1))/100;
           $finaldiscount= $price - ($price * $percDiscount);

        @endphp

        <div class='prodDiv'>
            <div class="typeProduct">
                <h2 class="type">{{$prod->PS === 0 ? "Prodotto" : "Servizio" }}</h2>
            </div>
            <h2 class="titleProd">{{$prod->name}}</h2>
            <p class="descProd">{{$prod->description." di cui rimangono solo ".$prod->availability. " pezzi" }}</p>
            <p class="Price">{{$price.$prod->measure. " con sconto pari al ".$sconto. " per un complessivo di ". $finaldiscount.$prod->measure}}</p>
        </div>
      
   @endforeach
   
 @endif
@endsection