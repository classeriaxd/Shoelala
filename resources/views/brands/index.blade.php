@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div id="main-container" class="col-md-10">
                        
            <h2 class="display-1 text-center">All Brands</h2>
            <a href="/home">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
            @role('Super Admin')
                <a href="/b/create">
                    <button class="btn btn-primary col-md-12 btn-lg mb-2">Add a Brand</button>
                </a>
            @endrole
            
            <div class="card card-body">

                <div class="container-fluid content-row">
                    <div class="row">
                        @foreach($brands as $brand)
                        <a href="/b/{{$brand->slug}}" class="btn" style="text-transform: uppercase">
                            <div class="col-md-12 d-flex float-left">
                                <div class="card flex-fill" style="padding-top: 10px; padding-left: 2.5px; padding-right: 2.5px; border-width: 0;">
                                    <img id="cardimg" class="card-img-top"
                                    src="/storage/{{$brand->logo}}" alt="Card image cap" style="max-width: 220px; max-height: 100px; min-height: 100px; min-width: 220px;">
                                    <div class="card-body">
                                        <h4 class="card-title" style="text-transform: uppercase">{{ $brand->name }}</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
