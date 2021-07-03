@extends('layouts.layout')

@section('content')
<div id="main-container" class="container" style="margin-top: 200px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-header">Choices</div>
                <div class="card-body text-center">
                    <a href="/s">
                        <button class="btn btn-primary">All Shoes</button>
                    </a>
                    <a href="/b">
                        <button class="btn btn-primary">All Brands</button>
                    </a>
                @role('Admin')
                    <a href="/orders">
                        <button class="btn btn-primary">Orders</button>
                    </a>
                    <a href="/stocks">
                        <button class="btn btn-primary">Stocks</button>
                    </a>
                @elserole('Super Admin')   
                    <a href="/orders">
                        <button class="btn btn-primary">Orders</button>
                    </a>
                    <a href="/stocks">
                        <button class="btn btn-primary">Stocks</button>
                    </a>        
                    
                @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
