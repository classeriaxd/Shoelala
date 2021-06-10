@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Shoes View</h2>
            @foreach($brands as $brand)
            <div class="card mb-2" style="width: 100%">
                <div class="card-header text-center">{{$brand->name}}</div>
                <div class="card-body d-flex flex-row">
                    @foreach($brand->shoes as $shoe)
                    <a href="/shoes/{{$shoe->id}}" class="mr-2 mb-1">
                        <div class="card" style="width: 100%; color: black;">               
                            <img src="https://via.placeholder.com/200.png?text=Sample+Image" class="card-img-top m-auto" style="max-width: 200px">
                            <div class="card-body text-center" style="text-decoration: none; color: inherit;">
                                <h5 class="card-title">{{ $shoe->name }}</h5>
                                <p class="card-text">SKU: {{ $shoe->sku }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        <hr>
        <div class="row justify-content-center pt-1">
            <a href="/shoes">
                <button class="btn btn-secondary">Go back</button>
            </a>
        </div>
        </div>
    </div>
</div>
@endsection
