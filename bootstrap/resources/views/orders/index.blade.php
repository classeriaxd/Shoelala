@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Order Index</h2>
            <a href="/home">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
                <div class="card">
                    <div class="card-header text-center">{{ __('Order Dashboard') }}</div>
                    <div class="card-body">
                        @role('Super Admin')
                            <a href="/orders/scan">
                                <button class="btn btn-primary col-md-12 btn-lg">Scan QR</button>
                            </a>
                        @elserole('Admin')
                            <a href="/orders/scan">
                                <button class="btn btn-primary">Scan QR</button>
                            </a>
                        @endrole
                    </div>
                </div>
            <hr>
        </div>
    </div>
</div>
@endsection
