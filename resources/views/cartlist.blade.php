@extends('layouts.layout')

@section('content')
<div class="container">
   <div class="row">
        <div id="main-container" class="container">
        <h1>Cart Items</h1>
        @foreach ($cartlist as $item)
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Order Number</th>
                <th scope="col">Shoe Name</th>
                <th scope="col" colspan="5">Shoe Description</th>
                <th scope="col">Unit Price (Quantity)</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->name}}</td>
                <td colspan="5">{{$item->description}}</td>
                <td>{{$item->price}}x{{$item->cart_quantity}}</td>
                <td>={{number_format($item->price*$item->cart_quantity,2)}}</td>
                <td>
                <a href="/c/cartlist/{{$item->cart_id}}" class="btn btn-warning">Remove from Cart</a>     
                </td>
                </tr>
            </tbody>
        </table>
        @endforeach
        </div>
        <div class="row justify-content-center pt-1">
            <a href="/order" class="btn btn-success">Buy Now</a> 
        </div> 
   </div>
</div>
@endsection
