@extends('layouts.header')

@section('content')
    <div class="mb-4">
      <span class="cardnew">NEW PAIRS</span>
    </div>
      <div class="container-fluid content-row">
        <div class="row">
            @foreach($brands as $brand)
              @foreach($brand->shoes as $shoe)
              <div class="col-lg-4 d-flex float-left">
                <div class="card flex-fill">
                    @foreach($shoe->shoeImages as $image)
                    @if($image->image_angle_id == 3)
                    <img id="cardimg" class="card-img-top"
                      src="{{'/storage/'.$image->image}}" alt="Card image cap">
                    @endif
                    @endforeach
                    <div class="card-body">
                      <h4 class="card-title">{{$shoe->name}}</h4>
                      <!--<p class="card-text">{{$shoe->description}}</p>-->
                      <p class="card-text">
                        Price: ₱ {{$shoe->price}} 
                      </p>
                      <a href="https://www.nike.com/ph/launch/t/air-jordan-4-taupe-haze" class="btn">Buy</a>
                    </div>
                </div>
              </div>
              @endforeach
            @endforeach
        </div>
      </div>

@endsection
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