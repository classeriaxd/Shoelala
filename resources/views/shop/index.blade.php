@extends('layouts.header')

@section('content')
    <div class="mb-4">
      <span class="cardnew">NEW PAIRS</span>
    </div>

    <div class="col-md-3 float-left">
      <form action="{{URL::current()}}" method="GET">
        <div class="card">
          <div class="card-header">
            <h5>Brands</h5>
              <button type="submit" class="btn btn-primary btn-sm float-right">Filter</button>
          </div>
          <div class="card-body">
            @foreach ($brand as $brand)
            @php
              $checked = [];
              if (isset($_GET['filterbrand'])) 
              {
                $checked = $_GET['filterbrand'];
              }
            @endphp
            <div class="mb-1">
              <input type="checkbox" name="filterbrand[]" value="{{$brand->brand_id}}" 
              @if (in_array($brand->brand_id, $checked))
              checked
                  
              @endif
              >{{$brand->name}}
            </div>
            @endforeach
          </div>
        </div>
      </form>
    </div>
    
    <div class="col-md-12">
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