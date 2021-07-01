@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Order Index</h2>
                <div class="card">
                    <div class="card-header">{{ __('Order Dashboard') }}</div>
                    <div class="card-body">
                        @role('Super Admin')
                            <a href="/orders/scan">
                                <button class="btn btn-primary">Scan QR</button>
                            </a>
                        @elserole('Admin')
                            <a href="/orders/scan">
                                <button class="btn btn-primary">Scan QR</button>
                            </a>
                        @endrole
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
