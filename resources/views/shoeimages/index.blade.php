@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Shoes Images Index</h2>
            <h5 class="text-center text-muted">{{$shoe->name}}</h5>
            <br>
            <div class="card">
                <div class="card-header text-center card-title">Options</div>
                <div class="card-body text-center">
                    <a href="/shoes/{{$shoe->id}}/images/create" class="mr-2">
                        <button class="btn btn-primary">Add Images</button>
                    </a>
                    <a href="" class="mr-2">
                        <button class="btn btn-primary" disabled>View Images</button>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center pt-1">
                <a href="/shoes/{{$shoe->id}}">
                    <button class="btn btn-secondary">Go back</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
