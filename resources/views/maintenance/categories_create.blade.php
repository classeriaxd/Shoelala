@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-1 text-center">Category Maintenance</h2>
            <a href="{{route('maintenance.category.index')}}">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
            <br>
            <div class="card">
                <div class="card-header text-center">Add Category</div>
                <div class="card-body">
                    <form method="POST" action="{{route('maintenance.category.store')}}" enctype="multipart/form-data" id="categoryForm">
                        @csrf
                        <div class="form-group row">{{-- category name --}}
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autofocus>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit" id="submit">Add Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
