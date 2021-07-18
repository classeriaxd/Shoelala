@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-1 text-center">Add Stocks</h2>
            <a href="/stocks">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
            <div class="card">
                <div class="card-header">Add New Stocks</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('stocks.store')}}" enctype="multipart/form-data" id="StocksForm">
                        @csrf
                        <div class="form-group row">{{-- shoe name --}}
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('name') is-invalid @enderror" id="name" name="name" required> 
                                    <option value="-1">Select Name</option>
                                @foreach($shoe as $shoe)
                                    <option {{ old('name')==$shoe->name ? 'selected="selected"' : '' }} value="{{$shoe->shoe_id}}">{{$shoe->name}}</option>
                                @endforeach
                                </select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">{{-- size --}}
                            <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Size') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('size') is-invalid @enderror" id="size" name="size" required> 
                                    <option value="-1">Select Size</option>
                                @foreach($size as $size)
                                    <option {{ old('size')==$size->size_id ? 'selected="selected"' : '' }} value="{{$size->size_id}}">{{$size->type}}-{{$size->us}}</option>
                                @endforeach
                                </select>

                                @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">{{-- stocks --}}
                            <label for="stocks" class="col-md-4 col-form-label text-md-right">{{ __('Stocks') }}</label>
                            <div class="col-md-6">
                                <input id="stocks" type="text" class="form-control @error('stocks') is-invalid @enderror" name="stocks" value="{{ old('stocks') }}" required>

                                @error('stocks')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit" id="submit">Add Stocks</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="row justify-content-center pt-1">
                
            </div>
        </div>
    </div>
</div>


@endsection
