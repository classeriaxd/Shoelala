@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Brand View</h2>
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
        <div class="row justify-content-center pt-1">
            <a href="/b">
                <button class="btn btn-secondary">Go back</button>
            </a>
        </div>
        </div>
    </div>
</div>
@endsection
