@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Add Shoes</h2>
            <div class="card">
                <div class="card-header">Add New Shoes</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('shoes.store')}}" enctype="multipart/form-data" id="shoesForm">
                        @csrf
                        <div class="form-group row">{{-- shoe name --}}
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <option {{ old('brand')==$brand->id ? 'selected="selected"' : '' }} value="{{$brand->id}}">{{$brand->name}}</option>
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
                                    <option {{ old('type')=="1" ? 'selected="selected"' : '' }} value="1">Men</option>
                                    <option {{ old('type')=="2" ? 'selected="selected"' : '' }} value="2">Women</option>
                                    <option {{ old('type')=="3" ? 'selected="selected"' : '' }} value="3">Kids</option>

                                {{-- use this if will load using db
                                    @foreach($categories as $category)
                                    <option>{{$category->name}}</option>
                                    @endforeach
                                --}}

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
                                    <option {{ old('category')=="1" ? 'selected="selected"' : '' }} value="1">Running Shoes</option>
                                {{-- use this if will load using db
                                    @foreach($categories as $category)
                                    <option>{{$category->name}}</option>
                                    @endforeach
                                --}}

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
                                <input id="sku" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ old('sku') }}" required autocomplete="sku">

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
            <div class="row justify-content-center pt-1">
                <a href="/shoes">
                    <button class="btn btn-secondary">Go back</button>
                </a>
            </div>
        </div>
    </div>
</div>


@endsection
