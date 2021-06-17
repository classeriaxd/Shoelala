@extends('layouts.app')

@section('content')
<div class="container">
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
                    <a href="/shoes">
                        <button class="btn btn-primary">Shoes</button>
                    </a>
                    <a href="/brands">
                        <button class="btn btn-primary">Brands</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
