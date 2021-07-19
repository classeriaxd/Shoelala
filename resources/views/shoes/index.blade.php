@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 10px;" id="main-container">
    <div class="row justify-content-center">
        
        <div id="main-container" class="col-md-8">
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
                    <div class="row">
                        <div class="card mb-2" style="width: 100%">
                            <div id="brandname" class="card-header text-center">{{$brand->name}}</div>
                            <div class="card-body d-flex flex-row justify-content-center">
                                @if($brand->shoes->count()>0)
                                @foreach($brand->shoes as $shoe)
                                <a href='/s/{{$brand->slug}}/{{$shoe->slug}}' class="mr-2 mb-1">
                                    <div class="card" style="width: 100%; color: black;">
                                @php
                                    $front_image = 'https://via.placeholder.com/200.jpg?text=Sample+Shoe+Image+here';
                                    foreach($shoe->shoeImages as $image):
                                            $front_image = '/storage/'.$image->image;
                                    endforeach;
                                @endphp               
                                        <img src="{{$front_image}}" class="card-img-top m-auto" style="max-width: 200px">
                                        <div class="card-body text-center" style="text-decoration: none; color: inherit;">
                                            <h5 class="card-title">{{ $shoe->name }}</h5>
                                            <p class="card-text">SKU: {{ $shoe->sku }}</p>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                                @else
                                <p>No shoes found</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach


            <!--
            @foreach($brands as $brand)
            <div id="brandname" class="card-header text-center">{{$brand->name}}</div>
            <div class="card card-body">
                <div class="container-fluid content-row">
                    <div class="row">
                        @foreach($brand->shoes as $shoe)
                        <a href='/s/{{$brand->slug}}/{{$shoe->slug}}' style="text-transform: uppercase">
                            <div class="col-md-12 d-flex float-left">
                                @php
                                    $front_image = 'https://via.placeholder.com/200.jpg?text=Sample+Shoe+Image+here';
                                    foreach($shoe->shoeImages as $image):
                                            $front_image = '/storage/'.$image->image;
                                    endforeach;
                                @endphp
                                <div class="card flex-fill" style="padding-top: 10px; padding-left: 2.5px; padding-right: 2.5px;">
                                    <img id="cardimg" class="card-img-top"
                                    src="{{$front_image}}" alt="Card image cap" style="max-width: 150px; max-height: 200px;">
                                    <div class="card-body">
                                        <p class="card-title">{{ $shoe->name }}</p>
                                        <p class="card-text">SKU: {{ $shoe->sku }}</p>
                                    </div>

                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach -->

        <hr>
        </div>
    </div>
</div>
@endsection
