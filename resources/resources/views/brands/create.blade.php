@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    @role('Super Admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Add Brand</h2>
            <a href="/b">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
            <div class="card">
                <div class="card-header">Add New Brand</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('brand.store')}}" enctype="multipart/form-data" id="brandsForm">
                        @csrf
                        <div class="form-group row">{{-- brand name --}}
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
                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">Brand Logo</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file @error('logo') is-invalid @enderror" id="logo" name="logo" required>
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        
                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit" id="submit">Add Brand</button>
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
