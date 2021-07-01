<?php
use App\Http\Controllers\TransactionsController;
$total=TransactionsController::cartItem();
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout-css.css') }}">
    
    @if($instascanJS ?? false)
    {{-- Instascan JS--}}
    <script src="{{ asset('js/instascan/adapter.min.js') }}"></script>
    <script src="{{ asset('js/instascan/vue.min.js') }}"></script>
    <script src="{{ asset('js/instascan/instascan.min.js') }}"></script>
    @endif

</head>
<body>
    <header id="app">
        <nav id="navbar" class="navbar fixed-top navbar-expand-lg shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img id="navbar-logo" src="/imgs/re-logo2.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav-menu">
                        <li class="nav-item active">
                            <a class="nav-link " href="/">HOME</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/shop">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/shop/mens">Mens</a></li>
                                <li><a class="dropdown-item" href="/shop/womens">Womens</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ABOUT</a>
                        </li>
                        <li class="nav-item">    
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>

                    <!-- Right Side Of Navbar -->
                        <!-- Authentication Links -->
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/c/cartlist">cart({{$total}})</a>
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('dashboard') }}
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </header>
    @if($instascanJS ?? false)
        <script type="text/javascript">
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
            let videoConstraints = {};
            function closeCamera()
            {
                document.getElementById('cameraToggle').onclick = openCamera;
                scanner.stop()
            }
            function getCameras()
            {
                let select = document.getElementById('videoSource');
                Instascan.Camera.getCameras().then(function(cameras) 
                {
                    if(cameras.length > 0) 
                    {
                        for (let i = select.length - 1; i >= 0; i--) 
                        {
                            select.remove(i);
                        }

                        for (let i = 0; i < cameras.length; i++) 
                        {
                            let opt = document.createElement('option');
                            opt.value = cameras[i].id;
                            opt.innerText = cameras[i].name;
                            select.add(opt);
                        }
                        scanner.start(cameras[1]);
                    }
                    else 
                        alert('No cameras found');
                }).catch(function(e){
                    console.error(e);
                });
                
            }

            function openCamera()
            {
                let select = document.getElementById('videoSource');
                const video = document.getElementById('preview');
                document.getElementById('cameraToggle').onclick = closeCamera;

                scanner.addListener('scan', function(result)
                {
                    if(result != null)
                    {
                        document.getElementById('code').innerText = result;
                        console.log(result);

                    }
                    else
                        document.getElementById('code').innerText = 'Code Appears Here...';
                });
                videoConstraints.deviceId = {exact: select.value};
                console.log(videoConstraints.deviceId);
                videoConstraints.width = { min: 640, ideal: 1280, max: 1920 };
                videoConstraints.height = { min: 480, ideal: 720, max: 1080 };

                navigator.mediaDevices
                    .getUserMedia({ video: videoConstraints, audio: false })
                    .then(stream => {
                        video.srcObject = stream;
                    }).catch(error => { console.error(error); });

            }  

        </script>
    @endif
</body>
</html>