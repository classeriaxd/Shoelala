@extends('layouts.layout')

@section('content')
<?php
use Carbon\Carbon;
?>
<div id="main-container" class="container">
   <div class="row">
        <div class="container">
            <h2 class="display-1 text-center mb-1">Order Contents</h2>
            <a href="/c/pendingOrders">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Item Number</th>
                <th scope="col">Shoe Name</th>
                <th scope="col" colspan="5">SKU</th>
                <th scope="col">Size(US/EUR/UK/CM)</th>
                <th scope="col">Unit Price (Quantity)</th>
                <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cancelledOrdersItems as $item)
                <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->name}}</td>
                <td colspan="5">{{$item->sku}}</td>
                <td>{{$item->size_id}}/{{$item->size_id2}}/{{$item->size_id3}}/{{$item->size_id4}}</td>
                <td>{{$item->shoe_price}}x{{$item->order_quantity}}</td>
                <td>={{number_format($item->shoe_price*$item->order_quantity,2)}}</td>
                </tr>
                @endforeach
            </tbody>
            <p >Date of Cancellation:  {{strftime("%B %e, %Y",strtotime($item->cancelled_date))}}</p>
        </table>
                
        </div>
   </div></div>
@endsection
