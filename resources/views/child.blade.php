@extends('layouts.homepage')

@section('productsList')
 @if($products)
   @foreach($products as $prod)
        @php
           $price = $prod->cost;
           $sconto = $prod->discount;
           $percDiscount= $sconto/100;
           $finaldiscount= $price - ($price * $percDiscount);

        @endphp

        <div class='prodDiv'>
            <div class="typeProduct">
                <h2 class="type">{{$prod->PS === 0 ? "Prodotto" : "Servizio" }}</h2>
            </div>
            <h2 class="titleProd">{{$prod->name}}</h2>
            <p class="descProd">{{$prod->description." di cui rimangono solo ".$prod->availability. " pezzi" }}</p>
            <p class="Price">{{$price.$prod->measure. " con sconto pari al ".$sconto. "% per un complessivo di ". $finaldiscount.$prod->measure}}</p>
        </div>
      
   @endforeach
   
 @endif
@endsection