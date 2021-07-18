<?php
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\CartController;
$total=CartController::cartItem();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shoelala</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="http://fonts.cdnfonts.com/css/bebas" rel="stylesheet">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="shortcut icon" href="{{ asset('imgs/favicon.svg') }}">

    </head>
    <body id="body" class="antialiased">

        <header class="header">
            <nav id="navbar" class="navbar navbar-expand-xl fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img id="navbar-logo" src="/imgs/re-logo2.png" alt="logo">
                    </a>

                        <ul class="nav-menu">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/">HOME</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="/home">Dashboard</a>
                            </li>
                            @endguest
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="/shop">SHOP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ABOUT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">CONTACT</a>
                            </li>

                            @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @role('User')
                                    <a class="dropdown-item" href="/c/cartlist">cart({{$total}})</a>
                                    @endrole
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Dashboard') }}
                                    </a>
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
        </header>
        <main style="margin-top: 130px;">
            @yield('content')
        </main>
        <footer class="page-footer font-small blue">
        @include('layouts.footer')
        </footer>

</body>
</html>
