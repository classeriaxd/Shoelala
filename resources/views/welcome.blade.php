@extends('layouts.header')

@section('content')
<br>
        <div class="loader-wrapper">
            <h1 class="loader">
                <span id="shoe" class="loader-logo">Shoe</span>                
                <span id="lala" class="loader-logo">lala</span>                
            </h1>
        </div>
  <!--Carousel Wrapper-->
  
  <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
    
    <div>
      <span class="cardnew">NEW PAIRS</span>
    </div> 

    <ol class="carousel-indicators">
      <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
      <li data-target="#multi-item-example" data-slide-to="1"></li>
    </ol>

    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      <!--First slide-->
      <div class="carousel-item active" data-interval="2500">
            @foreach($brands as $brand)
              @foreach($brand->shoes as $shoe)
                  <div class="col-lg-4 d-flex float-left">
                      <div class="card flex-fill">
                          @foreach($shoe->shoeImages as $image)
                          @if($image->image_angle_id == 3)
                          <img id="cardimg" class="card-img-top mx-auto mt-2"
                          src="{{'/storage/'.$image->image}}" alt="Card image cap">
                          @endif
                          @endforeach
                          <div class="card-body">
                          <h4 class="card-title" style="text-transform: uppercase">{{$shoe->name}}</h4>
                          <p class="card-text">
                              Price: ₱ {{$shoe->price}} 
                          </p>
                          <a class="card-block stretched-link text-decoration-none" href="/s/{{$shoe->brandslug}}/{{$shoe->shoeslug}}" class="btn" style="text-transform: uppercase">Buy</a>
                          </div>
                      </div>
                  </div>
              @endforeach
            @endforeach
        </div>
      <!--/.First slide-->
  
      <!--Second slide-->
      <div class="carousel-item" data-interval="2500">
            @foreach($brands2 as $brand)
              @foreach($brand->shoes as $shoe)
                  <div class="col-lg-4 d-flex float-left">
                      <div class="card flex-fill">
                          @foreach($shoe->shoeImages as $image)
                          @if($image->image_angle_id == 3)
                          <img id="cardimg" class="card-img-top mx-auto mt-2"
                          src="{{'/storage/'.$image->image}}" alt="Card image cap">
                          @endif
                          @endforeach
                          <div class="card-body">
                          <h4 class="card-title" style="text-transform: uppercase">{{$shoe->name}}</h4>
                          <p class="card-text">
                              Price: ₱ {{$shoe->price}} 
                          </p>
                          <a class="card-block stretched-link text-decoration-none" href="/s/{{$shoe->brandslug}}/{{$shoe->shoeslug}}" class="btn" style="text-transform: uppercase">Buy</a>
                          </div>
                      </div>
                  </div>
              @endforeach
            @endforeach
        </div>
      <!--/.Second slide-->
  
    </div>
    <!--/.Slides-->

  </div>
    
  <script src="js/main.js"></script>
  <script>
    document.body.style.overflow = 'hidden';
  </script>
  

@endsection
