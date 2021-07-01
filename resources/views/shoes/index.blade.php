@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div id="main-container" class="col-md-8">
            <div class="row justify-content-center pt-1">
                <a href="/home">
                    <button class="btn btn-secondary">Go back</button>
                </a>
                <hr>
                    {{-- TODO: PERMISSIONS AND ROLES --}}
                    @if (Route::has('login'))
                        @auth
                        <div class="row">
                            <div class="card">
                                <div class="card-header">Options (only available when logged in)</div>
                                <div class="card-body text-center">
                                    <a href="/s/create" class="mr-2">
                                        <button class="btn btn-primary">Add a Shoe</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endauth
                    @endif
                </div>
            <h2 class="display-2 text-center">Shoes View</h2>
            @foreach($brands as $brand)
            <div class="row">
                <div class="card mb-2" style="width: 100%">
                    <div class="card-header text-center">{{$brand->name}}</div>
                    <div class="card-body d-flex flex-row justify-content-center">
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
                    </div>
                </div>
            </div>
            @endforeach
        
        <hr>
        </div>
    </div>
</div>
@endsection
