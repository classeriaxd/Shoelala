@extends('layouts.header')

@section('content')
    <div class="mb-4">
      <span class="cardnew">SHOP SHOES</span>
    </div>

    <div class="col-md-2 float-left">
      <form action="{{URL::current()}}" method="GET">
        <div class="card pr-5">
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

          <div class="card-header">
            <h5>Category</h5>
          </div>
          <div class="card-body">
            @foreach ($category as $category)
            @php
              $checked = [];
              if (isset($_GET['filtercategory'])) 
              {
                $checked = $_GET['filtercategory'];
              }
            @endphp
            <div class="mb-1">
              <input type="checkbox" name="filtercategory[]" value="{{$category->category_id}}" 
              @if (in_array($category->category_id, $checked))
              checked
              @endif
              >{{$category->category}}
            </div>
            @endforeach
          </div>

          <div class="card-header">
            <h5>Type</h5>
          </div>
          <div class="card-body">
            @foreach ($type as $type)
            @php
              $checked = [];
              if (isset($_GET['filtertype'])) 
              {
                $checked = $_GET['filtertype'];
              }
            @endphp
            <div class="mb-1">
              <input type="checkbox" name="filtertype[]" value="{{$type->type_id}}" 
              @if (in_array($type->type_id, $checked))
              checked
              @endif
              >{{$type->type}}
            </div>
            @endforeach
          </div>
        </div>
      </form>
    </div>
    
      <div class="container-fluid content-row">
        <div class="row">
            @foreach($shoe as $shoe)
              
              <div class="col-lg-4 d-flex float-left">
                <div class="card flex-fill">
                    
                    @if($shoe->image_angle_id == 3)
                    <img id="cardimg" class="card-img-top"
                      src="{{'/storage/'.$shoe->image}}" alt="Card image cap">
                    @endif
                    
                    <div class="card-body">
                      <h4 class="card-title">{{$shoe->shoes}}</h4>
                      <!--<p class="card-text">{{$shoe->description}}</p>-->
                      <p class="card-text">
                        Price: ₱ {{$shoe->price}} 
                      </p>
                      <a href="https://www.nike.com/ph/launch/t/air-jordan-4-taupe-haze" class="btn">Buy</a>
                    </div>
                </div>
              </div>
             
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