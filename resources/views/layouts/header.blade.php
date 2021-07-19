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
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/">HOME</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="/home">DASHBOARD</a>
                            </li>
                            @endguest
                            
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
                                <a id="navbarDropdown" class="nav-link dropdown" style="text-transform: uppercase;" href="{{ route('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name}}
                                </a>

                                @role('User')
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/c/cartlist">Your Cart({{$total}})
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/c/pendingOrders">Pending Items({{$pendingTotal}})
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-submenu" >
                                    <a style="margin-left: 24px; font-size: 14px;">My Other Orders</a>
                                    <ul class="dropdown-menu" >
                                    <li><a id="submenuitem" class="dropdown-item" href="/c/completedOrders" >Completed Items({{$completedTotal}})</a></li>
                                    <li><a id="submenuitem" class="dropdown-item" href="/c/cancelledOrders" >Cancelled Items({{$cancelledTotal}})</a></li>
                                    <li><a id="submenuitem" class="dropdown-item" href="/c/expiredOrders" >Expired Items({{$expiredTotal}})</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                    </a>
                                </li>
                            </ul>
                        @elserole('Admin')
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                <li><a class="dropdown-item" href="{{ route('home') }}">
                                            {{ __('Dashboard') }}
                                        </a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                </a></li>
                            </ul>
                        @elserole('Super Admin')
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                <li><a class="dropdown-item" href="{{ route('home') }}">
                                            {{ __('Dashboard') }}
                                        </a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                </a></li>
                            </ul>
                        @endrole
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
