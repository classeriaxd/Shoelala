@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-1 text-center">Brand View</h2>
            <a href="/b">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
            <div class="card mb-2" style="width: 100%">
                <div class="card-header text-center">{{$brand->name}}</div>
                <img src="/storage/{{$brand->logo}}" class="card-img-top m-auto w-50" >
@role('Super Admin')
                <div class="card-body text-center">
                    <hr>
                    <h5 class="card-title">Option</h5>
                    <form action="{{route('brand.destroy', $brand->slug)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" style="width: 100%">Delete</button>
                    </form>  
                </div>
@endrole
            </div>
        <hr>
        </div>
    </div>
</div>
@endsection
