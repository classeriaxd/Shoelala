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
                <div class="card-header text-center" style="text-transform: uppercase">{{$shoe->name}}</div>
                <div class="card-body text-center">
                    <div class="row justify-content-center">
                    @foreach($shoeImages as $shoeImage)
                        <img src="{{'/storage/'.$shoeImage->image}}" class="mr-2 mb-2" style="max-width:200px; max-height:200px;min-width:200px; min-height:200px;">
                    @endforeach
                    </div>
                </div>  
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

@if($stocks->count() > 0)
                        <div class="col-md-4 d-flex flex-column justify-content-center m-auto">
                            <form action="/c/add_to_cart/" method="POST">
                                @csrf
                            
                                <input type="hidden" name="shoe_id" value="{{$shoe->shoe_id}}">
                                <input type="hidden" name="type_id" value="{{$shoe->type_id}}">
                                <label for="size">{{ __('Size') }}</label>
                                        <select class="form-control @error('size') is-invalid @enderror" id="stock_id" name="stock_id" required> 
                                            <option value="-1">Select Size</option>
                                        @foreach ($stocks as $stock)
                                            @foreach($size as $size)
                                                @if($stock->size_id==$size->size_id)
                                                <option {{ old('stock_id')==$stock->stock_id ? 'selected="selected"' : '' }} value="{{$stock->stock_id}}">{{$size->size_us}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        </select>
                            <label for="quantity">Quantity: </label>
                            <input type="number" name="cart_quantity" min="1" max="5" value="{{$shoe->cart_quantity}}">
                            <br><br>
                            <button class="btn btn-primary">Add to cart</button>
                            </form>
                            <br><br>
                        </div>
@else
                        <div class="col-md-4 d-flex flex-column">
                            <p class="m-auto text-center">Currently out of stock.</p>
                        </div>
@endif                        
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
                  
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection
