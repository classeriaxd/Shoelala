@extends('layouts.layout')

@section('content')
<div id="main-container" class="container">
   <div class="row">
        <div class="container">
            <h2 class="display-1 text-center mb-1">Cart List</h2>
            <a href="/home">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
        @foreach ($cartlist as $item)

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
   </div>
   <a href="/order">
    <button class="btn btn-success col-md-12 btn-lg mb-2">Buy Now</button>
   </a> 
</div>
@endsection
