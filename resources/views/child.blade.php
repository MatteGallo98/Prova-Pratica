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

        <div class='prodDiv col-3'>
            <div class="typeProduct">
                <h2 class="type">{{$prod->PS === 0 ? "Prodotto" : "Servizio" }} <span class="dataProd">({{\Carbon\Carbon::parse($prod->created_at)->format('d M Y')}})</span></h2>
            </div>
            <h2 class="titleProd">{{$prod->name}}</h2>
            <p class="descProd">{{$prod->description}}{{$prod->PS===0 ? " di cui rimangono solo ".$prod->availability. " pezzi" : "" }}</p>
            <p class="Price">{{$price.$prod->measure. " con sconto pari al ".$sconto. "% per un complessivo di ". $finaldiscount.$prod->measure}}</p>
        </div>
      
   @endforeach
   
 @endif
@endsection