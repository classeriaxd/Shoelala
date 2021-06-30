@extends('layouts.header')

@section('content')
<br>
  <!--Carousel Wrapper-->
  <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
    
    <div>
      <span class="cardnew">NEW PAIRS</span>
    </div> 

    <ol class="carousel-indicators">
      <li data-target="#multi-item-example" data-slide-to="0" class="active"></i></li>
      <li data-target="#multi-item-example" data-slide-to="1"></li>
    </ol>

    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        
      <!--First slide-->
      <div class="carousel-item active" data-interval="2500">
      @foreach($brands as $brand)
                @foreach($brand->shoes as $shoe)
                    <div class="col-md-3" style="float:left">
                        <div class="card mb-2">
                            @foreach($shoe->shoeImages as $image)
                            @if($image->image_angle_id == 1)
                            <img class="card-img-top"
                              src="{{'/storage/'.$image->image}}" alt="Card image cap">
                            @endif
                            @endforeach
                            <div class="card-body">
                              <h4 class="card-title">{{$shoe->name}}</h4>
                              <p class="card-text">{{$shoe->description}}</p>
                              <p class="card-text">
                                Price: {{$shoe->price}} 
                              </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
  
        @foreach($brands as $brand)
        @foreach($brand->shoes as $shoe)
            <div class="col-md-3" style="float:left">
                <div class="card mb-2">
                    @foreach($shoe->shoeImages as $image)
                    @if($image->image_angle_id == 3)
                    <img id="cardimg" class="card-img-top"
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
  
        <div class="col-md-3" style="float:left">
          <div class="card mb-2">
            <img class="card-img-top"
              src="imgs/J4-MN.png" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Jordan 4 Manila</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <p class="card-text">
                Price: ₱349,695.00 
              </p>
              <a href="https://www.nike.com/ph/launch/t/air-jordan-4-taupe-haze" class="btn  ">Buy</a>
            </div>
          </div>
        </div>
  
        <div class="col-md-3" style="float:left">
          <div class="card mb-2">
            <img class="card-img-top"
              src="imgs/J1-DI.png" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Jordan 1 Low Dior</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <p class="card-text">
                Price: ₱259,695.00 
               </p>
              <a href="https://www.nike.com/ph/launch/t/air-jordan-4-taupe-haze" class="btn  ">Buy</a>
            </div>
          </div>
        </div>
        
         <div class="col-md-3" style="float:left">
         <div class="card mb-2">
            <img class="card-img-top"
              src="imgs/YZ350.png" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Yeezy 350</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <p class="card-text">
                Price: ₱19,695.00 
              </p>
              <a href="https://www.nike.com/ph/launch/t/air-jordan-4-taupe-haze" class="btn  ">Buy</a>
            </div>
          </div>
        </div>

        <div class="col-md-3" style="float:left">
          <div class="card mb-2">
             <img class="card-img-top"
               src="imgs/2.png" alt="Card image cap">
             <div class="card-body">
               <h4 class="card-title">J4 Taupe Haze</h4>
               <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                 card's content.</p>
               <p class="card-text">
                 Price: ₱19,695.00 
               </p>
               <a href="https://www.nike.com/ph/launch/t/air-jordan-4-taupe-haze" class="btn  ">Buy</a>
             </div>
           </div>
         </div>

  
      </div>
      <!--/.First slide-->
  

      <!--Second slide-->
      <div class="carousel-item" data-interval="2500">
  
        <div class="col-md-3" style="float:left">
          <div class="card mb-2">
            <img class="card-img-top"
              src="imgs/YZ700.png" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Yeezy 700</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <p class="card-text">
                Price: ₱29,695.00 
              </p>
              <a href="https://www.nike.com/ph/launch/t/air-jordan-4-taupe-haze" class="btn  ">Buy</a>
            </div>
          </div>
        </div>
  
        <div class="col-md-3" style="float:left">
          <div class="card mb-2">
            <img class="card-img-top"
              src="imgs/J4-UB.png" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Jordan 4 University Blue</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <p class="card-text">
                Price: ₱19,695.00 
              </p>
              <a href="https://www.nike.com/ph/launch/t/air-jordan-4-taupe-haze" class="btn  ">Buy</a>
            </div>
          </div>
        </div>
  
        <div class="col-md-3" style="float:left">
          <div class="card mb-2">
            <img class="card-img-top"
              src="imgs/J1-HR.png" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Jordan 1 Hyper Royal</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <p class="card-text">
                Price: ₱129,695.00 
            </p>
              <a href="https://www.nike.com/ph/launch/t/air-jordan-4-taupe-haze" class="btn  ">Buy</a>
            </div>
          </div>
        </div>
        
        <div class="col-md-3" style="float:left">
          <div class="card mb-2">
            <img class="card-img-top"
              src="imgs/J4-CJ.png" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Jordan 4 Cactus Jack</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <p class="card-text">
                Price: ₱259,695.00 
            </p>
              <a href="https://www.nike.com/ph/launch/t/air-jordan-4-taupe-haze" class="btn  ">Buy</a>
            </div>
          </div>
        </div>
      </div>

      <!--/.Second slide-->

  
    </div>
    <!--/.Slides-->

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