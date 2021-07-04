@extends('layouts.layout')

@section('content')
<div class="container">
   <div class="row">
        <div id="main-container" class="container">
        <h1>Cart Items</h1>
        @foreach ($cartlist as $cartItem)
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Order Number</th>
                <th scope="col">Shoe Name</th>
                <th scope="col" colspan="5">SKU</th>
                <th scope="col">Size(US/EUR/UK/CM)</th>
                <th scope="col">Unit Price (Quantity)</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$cartItem->name}}</td>
                <td colspan="5">{{$cartItem->sku}}</td>
                <td>{{$cartItem->size_id}}/{{$cartItem->size_id2}}/{{$cartItem->size_id3}}/{{$cartItem->size_id4}}</td>
                <td>{{$cartItem->shoe_price}}x{{$cartItem->cart_quantity}}</td>
                <td>={{number_format($cartItem->shoe_price*$cartItem->cart_quantity,2)}}</td>
                <td>
                <a href="/c/cartlist/{{$cartItem->cart_id}}" class="btn btn-warning">Remove from Cart</a>     
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
