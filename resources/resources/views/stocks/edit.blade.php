@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Edit Stocks</h2>
            <div class="card">
                <div class="card-header">Edit {{$shoe->name}} {{$size->size}}</div>
                <div class="card-body">
                    <form method="POST" action="/stocks/{{$brand->slug}}/{{$shoe->slug}}/{{$size->size_id}}" enctype="multipart/form-data" id="shoesForm">
                        @csrf
                        @method('PATCH')
                        
                        <div class="form-group row">{{-- stocks --}}
                            <label for="stocks" class="col-md-4 col-form-label text-md-right">{{ __('Stocks') }}</label>
                            <div class="col-md-6">
                                <input id="stocks" type="text" class="form-control @error('stocks') is-invalid @enderror" name="stocks" value="{{ old('stocks') ?? $stocks->stock }}" required>
                                @error('stocks')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit" id="submit">Edit Stocks</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <br>
            <div class="row justify-content-center pt-1">
                <a href="/stocks/{{$brand->slug}}/{{$shoe->slug}}">
                    <button class="btn btn-secondary">Go back</button>
                </a>
            </div>
        </div>
    </div>
</div>


@endsection
