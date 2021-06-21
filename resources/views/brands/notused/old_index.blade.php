@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Brands Index</h2>
            <div class="card">
                <div class="card-header">Options</div>
                <div class="card-body text-center">
                    <a href="/brands/create" class="mr-2">
                        <button class="btn btn-primary">Add a Brand</button>
                    </a>
                    <a href="/brands/view" class="mr-2">
                        <button class="btn btn-primary">View Brands</button>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center pt-1">
                <a href="/home">
                    <button class="btn btn-secondary">Go back</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
