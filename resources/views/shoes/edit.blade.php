@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Edit Shoes</h2>
            <div class="card">
                <div class="card-header">Edit {{$shoe->name}}</div>
                <div class="card-body">
                    <form method="POST" action="/s/{{$shoebrandslug}}/{{$shoe->slug}}" enctype="multipart/form-data" id="shoesForm">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">{{-- shoe name --}}
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $shoe->name }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">{{-- brands --}}
                            <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Brand') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" required> 
                                @foreach($brands as $brand)
                                    <option {{ $shoe->brand_id==$brand->brand_id ? 'selected="selected"' : '' }} value="{{$brand->brand_id}}">{{$brand->name}}</option>
                                @endforeach
                                </select>
                                @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">{{-- type --}}
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                                @foreach($types as $type)
                                    <option {{ $shoe->type_id==$type->type_id ? 'selected="selected"' : '' }} value="{{$type->type_id}}">{{$type->type}}</option>
                                @endforeach 
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">{{-- category --}}
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required> 
                                @foreach($categories as $category)
                                    <option {{ $shoe->category_id==$category->category_id ? 'selected="selected"' : '' }} value="{{$category->category_id}}">{{$category->category}}</option>
                                @endforeach
                                </select>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">{{-- SKU --}}
                            <label for="sku" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>
                            <div class="col-md-6">
                                <input id="sku" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ old('sku') ?? $shoe->sku }}" required>

                                @error('sku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">{{-- Description --}}
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description') ?? $shoe->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">{{-- price --}}
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $shoe->price }}" required>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit" id="submit">Edit Shoes</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center pt-1">
                <a href="/s/{{$shoebrandslug}}/{{$shoe->slug}}">
                    <button class="btn btn-secondary">Go back</button>
                </a>
            </div>
        </div>
    </div>
</div>


@endsection
