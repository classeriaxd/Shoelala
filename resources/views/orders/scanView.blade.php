@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Scan QR</h2>
                <div class="card">
                    <div class="card-header">{{ __('Scan Here') }}</div>
                    <div class="card-body text-center">
                        <video id="preview" width="320" height="240"></video>
                        <hr>
                            <button class="btn btn-primary mx-auto" id="cameraFinder" onclick="getCameras();" style="display: block;">Get Cameras</button>
                            <button class="btn btn-success mx-auto" id="cameraToggle" onclick="openCamera();" style="display: none; disabled: true;">Turn ON Camera</button>
                        <hr>
                        <h5>Camera Details</h5>
                        <label for="videoSource" class="mr-1">Video Source</label>
                        <select class="custom-select" id='videoSource'></select>
                        <small id="videoSourceHelper" class="form-text text-muted">
                            If there is a newly-connected camera, please refresh the page.
                        </small>
                        <br>
                        <h6 id="cameraName">Camera Name:</h6>
                        <h6 id="cameraId">Camera ID:</h6>
                        <hr>
                        <h5>Code</h5>
                        <h4 id='code'>Code Appears Here...</h4>

                    </div>
                </div>
            <hr>
            <div class="row justify-content-center pt-1">
                <a href="/">
                    <button class="btn btn-secondary">Go back</button>
                </a>
            </div>
        </div>
    </div>
</div>

@if($instascanJS ?? false)

    @push('scripts')
        {{-- Instascan JS --}}
        <script src="{{ asset('js/instascan/adapter.min.js') }}"></script>
        <script src="{{ asset('js/instascan/vue.min.js') }}"></script>
        <script src="{{ asset('js/instascan/instascan.min.js') }}"></script>
    @endpush

    @push('custom-scripts')
        {{-- Instascan Custom JS --}}
        <script type="text/javascript" src="{{ asset('js/instascan/custom-instascan.js') }}"></script>
    @endpush
@endif

@endsection


