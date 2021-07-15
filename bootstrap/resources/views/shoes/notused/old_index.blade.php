@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Shoes Index</h2>
            <div class="card">
                <div class="card-header">Options</div>
                <div class="card-body text-center">
                    <a href="/shoes/create" class="mr-2">
                        <button class="btn btn-primary">Add Shoes</button>
                    </a>
                    <a href="/shoes/view" class="mr-2">
                        <button class="btn btn-primary">View Shoes</button>
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
