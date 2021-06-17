@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center"></h2>
            <div class="card">
                <div class="card-header">Add New Shoe Image</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('shoeimage.store', $shoe)}}" enctype="multipart/form-data" id="shoeimagesForm">
                        @csrf
                        <div class="form-group row">{{-- angles --}}
                            <label for="angle" class="col-md-4 col-form-label text-md-right">{{ __('Image Angle') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('angle') is-invalid @enderror" id="angle" name="angle" required> 
                                    <option value="-1">Select Angle</option>
                                    <option {{ old('angle')==1 ? 'selected="selected"' : '' }} value="1">Front</option>
                                    <option {{ old('angle')==2 ? 'selected="selected"' : '' }} value="2">Back</option>
                                    <option {{ old('angle')==3 ? 'selected="selected"' : '' }} value="3">Right</option>
                                    <option {{ old('angle')==4 ? 'selected="selected"' : '' }} value="4">Left</option>
                                    <option {{ old('angle')==5 ? 'selected="selected"' : '' }} value="5">Insole</option>
                                    <option {{ old('angle')==6 ? 'selected="selected"' : '' }} value="6">Outsole</option>
                                </select>
                                @error('angle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="shoe_image" class="col-md-4 col-form-label text-md-right">Shoe Image</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file @error('shoe_image') is-invalid @enderror" id="shoe_image" name="shoe_image" required>
                                @error('shoe_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit" id="submit">Add Image</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center pt-1">
                <a href="{{ route('shoeimage.home', $shoe)}}">
                    <button class="btn btn-secondary">Go back</button>
                </a>
            </div>
        </div>
    </div>
</div>


@endsection
