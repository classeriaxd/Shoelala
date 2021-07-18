@extends('layouts.layout')

@section('content')
<div id="main-container" class="container">
   <div class="row">
        <div class="container">
            <h2 class="display-1 text-center mb-1">Cart List</h2>
            <a href="/home">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
          @if ($cartlist->count()>0)
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Cart Number</th>
                <th scope="col">Shoe Name</th>
                <th scope="col" colspan="5">SKU</th>
                <th scope="col">Size(US/EUR/UK/CM)</th>
                <th scope="col">Unit Price (Quantity)</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($cartlist as $cartItem)
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
            @endforeach
            </tbody>
        </table>
            <div class="row justify-content-center pt-1">
                <a href="/order" class="btn btn-success btn-lg col-md-12">Buy Now</a> 
            </div> 
        </div>
        @else
        <marquee scrollamount="35"> 
        <h2 class="text-center mt-2 mb-2">There are no items in your cart.</h2>
        </marquee>
        <div class="row justify-content-center pt-1">
            <a href="/s" class="btn btn-success  btn-lg col-md-12">Shop Now</a> 
        </div> 
        @endif
   </div></div>
@endsection
