@extends('layouts.layout')

@section('content')

<div class="container">
   <div class="row">
        <div id="main-container" class="container">
        <h1 class="display-1 text-center">Pending Orders</h1>
        <a href="/home">
            <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
        </a>
        @if ($pendingOrders->count()>0)
        @foreach ($pendingOrders as $pendingOrder)
        <div class="card">
        <div class="card-header">
        <table class="table table-hover">
            <thead>
            </div>
            <tr>
            <td scope="col">Order Number </td>
            <td scope="col">Order Code </td>
            <td scope="col"> QR Code</td>
            <td scope="col">Action</td>
            </tr>
            </thead>
            
            <tbody>
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$pendingOrder->order_uuid}}</td>
            <td>{!! QrCode::size(250)
                ->format('svg')
                //->gradient(36, 161, 229, 110, 250, 205, 'vertical')
                //->backgroundColor(255,55,0)
                ->style('round')
                ->eye('circle')
                ->generate("http://127.0.0.1:8000/orders/o/$pendingOrder->order_uuid"); !!}</td>
            <td><a href="/c/pendingOrders/{{$pendingOrder->order_uuid}}" class="btn btn-success">View</a> </td>
            </tr>
          
        </tbody>
        </table>
        </div>
        @endforeach
        
        </div>
        @else
        <h2>There are no items in your cart.</h2>
        <div class="row justify-content-center pt-1">
            <a href="/s" class="btn btn-success">Shop Now</a> 
        </div> 
        @endif
   </div>
</div>
@endsection
