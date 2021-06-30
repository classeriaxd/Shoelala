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
                                      

        <!-- Styles
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style> -->

        <link rel="stylesheet" href="/css/main.css">
        
    </head>
    <body id="body" class="antialiased">

        <div class="loader-wrapper">
            <h1 class="loader">
                <span id="shoe" class="loader-logo">Shoe</span>                
                <span id="lala" class="loader-logo">lala</span>                
            </h1>
        </div>

        <header class="header">
            <nav id="navbar" class="navbar fixed-top">
                <div class="container">           
                    <a class="navbar-brand" href="#">
                        <img id="navbar-logo" src="/imgs/re-logo2.png" alt="logo">
                    </a>
                                    
                        <ul class="nav-menu">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">HOME</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="/shop">SHOP</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Mens</a></li>
                                    <li><a class="dropdown-item" href="#">Womens</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ABOUT US</a>
                            </li>
                            <li class="nav-item">    
                                <a class="nav-link" href="#">CONTACT  US</a>
                            </li>
                        </ul>
                </div>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>

                @if (Route::has('login'))
                    <div id="nbar-buttons" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                        <a id="nbar-buttons-account" href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Account</a>
                        @else
                        <a id="nbar-buttons-login" href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                        
                        @if (Route::has('register'))
                        <a id="nbar-buttons-register" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                        @endauth
                    </div>
                @endif
            </nav>
        </header>

  <!--Carousel Wrapper-->
  <div class="title-wrapper">
    <span class="cardnew">NEW PAIRS</span>
  </div> 

  <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
    <!--
    <ol class="carousel-indicators">
      <li data-target="#multi-item-example" data-slide-to="0" class="active"></i></li>
      <li data-target="#multi-item-example" data-slide-to="1"></li>
    </ol>
    -->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      <!--First slide-->
      <div class="carousel-item active" data-interval="2500">
        @foreach($brands as $brand)
        @foreach($brand->shoes as $shoe)
            <div class="col-md-3" style="float:left">
                <div class="card mb-2">
                    @foreach($shoe->shoeImages as $image)
                    @if($image->image_angle_id == 3)
                    <img id="cardimg" class="card-img-top mx-auto mt-2"
                      src="{{'/storage/'.$image->image}}" alt="Card image cap">
                    @endif
                    @endforeach
                    <div class="card-body">
                      <h4 class="card-title">{{$shoe->name}}</h4>
                      <p class="card-text">{{$shoe->description}}</p>
                      <p class="card-text">
                        Price: ₱ {{$shoe->price}} 
                      </p>
                      <a href="https://www.nike.com/ph/launch/t/air-jordan-4-taupe-haze" class="btn">Buy</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
      <!--/.Second slide-->
    </div>
    <!--/.Slides-->
  </div>

  <!-- Footer -->
  <footer class="page-footer font-small blue">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
      © YEAR 2021 :
      <a href="https://mdbootstrap.com/" style="color: #165495;"> ShoeLala.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
        
        <script src="js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>
        <!--
        <div class="container-card">
            <div class="card">
                <div class="sneaker">

                </div>
            </div>
        </div>
        -->
        
        <!--
                    
        <!--