@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Shoe View</h2>
            <a href="/s">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
            <div class="card mb-2">
                <div class="card-header text-center">{{$shoe->name}}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                                <p>Brand: {{$brand->name}}</p>
                                <p>Price: ₱{{$shoe->price}}</p>
                                <p>SKU: {{$shoe->sku}}</p>
                                <p>Type and Category: {{$type."'s"." ".$category}}</p>
                                <p>Description: {{($shoe->description == NULL)?"None":$shoe->description}}</p>
                        </div>
@role('Super Admin')
                        <div class="col-md-12 d-flex flex-column justify-content-center m-auto">
                            <a href='/s/{{$brand->slug}}/{{$shoe->slug}}/edit' class="mb-2">
                                <button class="btn btn-primary" style="width: 100%">Edit</button>
                            </a>
                            <form action="{{route('shoes.destroy', [$brand->slug, $shoe->slug])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" style="width: 100%">Delete</button>
                            </form>
                        </div>
@elserole('User')
                        <div class="col-md-2 d-flex flex-column justify-content-center m-auto">
                            <form action="/c/add_to_cart" method="POST">
                                @csrf
                                <input type="hidden" name="shoe_id" value="{{$shoe->shoe_id}}">
                            <button class="btn btn-primary">Add to cart</button>
                            </form>
                            <br><br>
                        </div>                        
@endrole
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between">
                    <div class="my-auto h5">Images</div>
@role('Super Admin')
                    <div>
                        <a href="/s/{{$brand->slug}}/{{$shoe->slug}}/images/create">
                            <button class="btn btn-primary">Add Image</button>
                        </a>
                    </div>
@endrole
                </div>
                <div class="card-body text-center">
                    <div class="row justify-content-center">
                    @foreach($shoeImages as $shoeImage)
                        <img src="{{'/storage/'.$shoeImage->image}}" class="mr-2 mb-2" style="max-width:200px; max-height:200px;min-width:200px; min-height:200px;">
                    @endforeach
                    </div>
                </div>    
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection
