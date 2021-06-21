@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Brand View</h2>
            <div class="card mb-2" style="width: 100%">
                <div class="card-header text-center">{{$brand->name}}</div>
                <img src="/storage/{{$brand->logo}}" class="card-img-top m-auto" >
                <div class="card-body text-center">
                    <hr>
                    <h5 class="card-title">Option</h5>
                    <button class="btn btn-danger" disabled>Delete</button>
                    <p class="text-muted">(wip)</p>
                </div>
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
