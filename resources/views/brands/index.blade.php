@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">All Brands</h2>
            <div class="row">
                <div class="card mb-2" style="width: 100%">
                    <div class="card-header text-center">Brands</div>
                    <div class="card-body d-flex flex-row justify-content-center">
                    @foreach($brands as $brand)
                        <a href="/b/{{$brand->slug}}">
                            <div class="card mr-2" style="width: 100%; color: black; max-width: 200px;">               
                                <img src="/storage/{{$brand->logo}}" class="card-img-top m-auto" style="max-width: 200px; max-height: 100px;">
                                <div class="card-body text-center" style="text-decoration: none; color: inherit;">
                                    <h5 class="card-title">{{ $brand->name }}</h5>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    </div>
                </div>
            </div>
@role('Super Admin')
            <div class="row">
                <div class="card">
                    <div class="card-header">Options</div>
                    <div class="card-body text-center">
                        <a href="/b/create" class="mr-2">
                            <button class="btn btn-primary">Add a Brand</button>
                        </a>
                    </div>
                </div>
            </div>
@endrole
        <hr>
        <div class="row justify-content-center pt-1">
            <a href="/">
                <button class="btn btn-secondary">Go back</button>
            </a>
        </div>
        </div>
    </div>
</div>
@endsection
