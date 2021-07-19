@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 10px;" id="main-container">
    <div class="row justify-content-center">
        
        <div id="main-container" class="col-md-10">
            <h2 class="display-1 text-center mb-1">Shoes View</h2>
            <a href="/home">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
            @role('Super Admin')
                <a href="/s/create" class="mr-2">
                    <button class="btn btn-primary col-md-12 btn-lg mb-2">Add Shoes</button>
                </a>
            @endrole

        
            @foreach($brands as $brand)
            <div class="card card-body mb-2">
                    <div id="brandname" class="display-2 card-header text-center" style="margin-top: -25px;margin-right: -25px;margin-bottom: 25px;margin-left: -25px; text-transform: uppercase;">{{$brand->name}}</div>
                    <div class="container-fluid content-row ">
                        <div class="row">
                            @if($brand->shoes->count()>0)
                                @foreach($brand->shoes as $shoe)
                                <a href="/s/{{$brand->slug}}/{{$shoe->slug}}" class="btn" style="text-transform: uppercase; max-width: 280px; max-height: 280;min-width: 280px; min-height: 280;">
                                        @php
                                            $front_image = 'https://via.placeholder.com/200.jpg?text=Sample+Shoe+Image+here';
                                            foreach($shoe->shoeImages as $image):
                                            $front_image = '/storage/'.$image->image;
                                        endforeach;
                                        @endphp
                                        <div class="card col-md-12" style="border-width: 0;">
                                            <img id="cardimg" class="card-img-top"
                                            src="{{$front_image}}" alt="Card image cap" style="max-width: 220px; max-height: 250px; min-height: 250px; min-width: 220px; ">
                                            <div class="card-body">
                                                <p class="card-title">{{ $shoe->name }}</p>
                                                <p class="card-text">SKU: {{ $shoe->sku }}</p>
                                            </div>
                                        </div>
                                </a>
                                @endforeach
                            @else
                            <p class="col-md-12 text-center">
                                No shoes found
                            </p>
                            @endif
                        </div>
                    </div> 
                </div>
            @endforeach


        <hr>
        </div>
    </div>
</div>
@endsection
