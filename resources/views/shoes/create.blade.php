@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    @role('Super Admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-1 text-center">Add Shoes</h2>
            <a href="/s">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
            <div class="card">
                <div class="card-header">Add New Shoes</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('shoes.store')}}" enctype="multipart/form-data" id="shoesForm">
                        @csrf
                        <div class="form-group row">{{-- shoe name --}}
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

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
                                    <option value="-1">Select Brand</option>
                                @foreach($brands as $brand)
                                    <option {{ old('brand')==$brand->brand_id ? 'selected="selected"' : '' }} value="{{$brand->brand_id}}">{{$brand->name}}</option>
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
                                    <option {{ old('type')=="-1" ? 'selected="selected"' : '' }} value="-1">Select Shoe Type</option>
                                @foreach($types as $type)
                                    <option {{ old('type')==$type->type_id ? 'selected="selected"' : '' }} value="{{$type->type_id}}">{{$type->type}}</option>
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
                                    <option {{ old('category')=="0" ? 'selected="selected"' : '' }} value="-1">Select Category</option>
                                @foreach($categories as $category)
                                    <option {{ old('category')==$category->category_id ? 'selected="selected"' : '' }} value="{{$category->category_id}}">{{$category->category}}</option>
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
                                <input id="sku" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ old('sku') }}" required>

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
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description') ?? '' }}</textarea>
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
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit" id="submit">Add Shoes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
        </div>
    </div>
    @endrole
</div>
@endsection
