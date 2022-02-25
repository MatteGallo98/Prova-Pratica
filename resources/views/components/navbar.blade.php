
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd!important;">
            <a class="navbar-brand brand" href="/">BuyMe</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                                @auth
                                <li class="nav-item">
                                    <a href="{{ url('/dashboard') }}" class="nav-link underline me-auto">Dashboard</a>
                                </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link underline me-auto">Log in</a>
                                    </li>
                                @endauth
                            
                        @endif
                    @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->admin === 1)
                                        <a class="dropdown-item" href="{{ route('gest_utenti') }}">
                                            Gestione Utenti 
                                        </a>
                                        <a class="dropdown-item" href="{{ route('gest_prodotti') }}">
                                            Gestione Prodotti
                                        </a>
                                        <a class="dropdown-item" href="{{ route('gest_ordini') }}">
                                            Gestione Ordini
                                        </a>
                                    @endif
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                     @endguest
                    </ul>
                </div>
        </nav>