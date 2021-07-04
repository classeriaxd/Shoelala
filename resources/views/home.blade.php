@extends('layouts.layout')

@section('content')
<div id="main-container" class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <h2 class="display-2 text-center mb-1">dashboard</h2>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as') }} {{ Auth::user()->first_name}}
                </div>
                <div class="card-header text-center">
                    <h1>
                        View
                    </h1>
                </div>
                <div class="card-body text-center">
                    <a href="/s">
                        <button class="btn btn-primary col-md-12 btn-lg mb-2">All Shoes</button>
                    </a>
                    <a href="/b">
                        <button class="btn btn-primary col-md-12 btn-lg mb-2">All Brands</button>
                    </a>
                @role('Admin')
                    <a href="/orders">
                        <button class="btn btn-primary col-md-12 btn-lg mb-2">Orders</button>
                    </a>
                    <a href="/stocks">
                        <button class="btn btn-primary col-md-12 btn-lg mb-2">Stocks</button>
                    </a>
                @elserole('Super Admin')   
                    <a href="/orders">
                        <button class="btn btn-primary col-md-12 btn-lg mb-2">Orders</button>
                    </a>
                    <a href="/stocks">
                        <button class="btn btn-primary col-md-12 btn-lg mb-2">Stocks</button>
                    </a>        
                    
                @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
