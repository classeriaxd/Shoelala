@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Scan QR</h2>
                <div class="card">
                    <div class="card-header">{{ __('Scan Here') }}</div>
                    <div class="card-body">
                        <video id="preview" width="320" height="240"></video>
                        <hr>
                            <button id="cameraToggle" onclick="openCamera();">Turn ON Camera</button>
                            <button id="cameraToggle" onclick="getCameras();">getCameras();</button>
                        <hr>
                        <h5>Camera Details</h5>
                        <select id='videoSource'></select>
                        <h6 id="cameraName"></h6>
                        <h6 id="cameraID"></h6>
                        <hr>
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

@endsection

