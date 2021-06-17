@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Shoe View</h2>
            <div class="card">
                <div class="card-header text-center">{{$shoe->name}}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                                <p>Brand: {{$brand}}</p>
                                <p>Price: ₱{{$shoe->price}}</p>
                                <p>SKU: {{$shoe->sku}}</p>
                            @php
                                $shoe_category="";
                                if($shoe->type == 1):
                                    $shoe_category = $shoe_category."Men's ";
                                elseif($shoe->type == 2):
                                    $shoe_category = $shoe_category."Women's ";
                                elseif($shoe->type == 3):
                                    $shoe_category = $shoe_category."Kid's ";
                                endif;
                                if($shoe->category == 1):
                                    $shoe_category = $shoe_category."Running Shoes";
                                endif;
                            @endphp
                                <p>Category: {{$shoe_category}}</p>
                                <p>Description: {{($shoe->description == NULL)?"None":$shoe->description}}</p>
                        </div>
                        <div class="col-md-2 d-flex flex-column justify-content-center m-auto">
                            <a href="/shoes/{{$shoe->id}}/edit" class="mb-2">
                                <button class="btn btn-primary" style="width: 100%">Edit</button>
                            </a>
                            <form action="{{route('shoes.destroy', $shoe->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" style="width: 100%">Delete</button>
                            </form> 
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between">
                    <div class="my-auto h5">Images</div>
                    <div>
                        <a href="/shoes/{{$shoe->id}}/images">
                            <button class="btn btn-primary">View all Images</button>
                        </a>
                    </div>
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
            <div class="row justify-content-center pt-1">
                <a href="/shoes/view">
                    <button class="btn btn-secondary">Go back</button>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
