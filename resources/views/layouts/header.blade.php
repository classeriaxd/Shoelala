<?php
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
$total=CartController::cartItem();
$pendingTotal=OrderController::pendingOrderItem();
$completedTotal=OrderController::completedOrderItem();
$cancelledTotal=OrderController::cancelledOrderItem();
$expiredTotal=OrderController::expiredOrderItem();
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
        <link rel="stylesheet" href="/css/main.css">
        <link rel="shortcut icon" href="{{ asset('imgs/favicon.svg') }}">

    </head>
    <body id="body" class="antialiased">

        <header class="header">
            <nav id="navbar" class="navbar fixed-top navbar-expand-lg shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img id="navbar-logo" src="/imgs/re-logo2.png" alt="logo">
                    </a>

                        <ul class="nav-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="/">HOME</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="/shop">SHOP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/abtcont">ABOUT</a>
                            </li>

                            @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                </li>
                            @endif
                        @else
                            <ul class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" style="text-transform: uppercase;" href="{{ route('home') }}">
                                    {{ Auth::user()->first_name}}
                                </a>
                            </ul>

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
