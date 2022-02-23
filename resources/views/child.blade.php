@extends('layouts.homepage')

@section('navbar')
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd!important;">
            <a class="navbar-brand" href="#">BuyMe</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="login justify-content-end">
                    @if (Route::has('login'))
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link underline me-auto">Dashboard</a>
                            </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link underline me-auto">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link underline me-auto">Register</a>
                                </li>
                                @endif
                            @endauth
                        </ul>
                    @endif
                </div>
            </div>
        </nav>
@endsection