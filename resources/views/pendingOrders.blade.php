@extends('layouts.layout')

@section('content')
<?php
use Carbon\Carbon;
?>
<div class="container">
   <div class="row">
        <div id="main-container" class="container">
        <h1>Pending Orders</h1>
        @if ($pendingOrders->count()>0)
        @foreach ($pendingOrders as $pendingOrder)
        <div class="card">
        <div class="card-header">
        <table class="table table-hover">
            <thead>
            <tr> Order Code: {{$pendingOrder->order_uuid}}
            </tr>   
            </div>
            <tr>
            <td scope="col">Shoe Name </td>
            <td scope="col">SKU</td>
            <td scope="col">Total Price</td>
            <td scope="col">Order Date</td>
            <td scope="col">Pickup Date</td>
            <td scope="col">Action</td>
            </tr>
            
            <tr></tr>
            
            <tr>
            <td>{{$pendingOrder->name}} </td>
            <td>{{$pendingOrder->sku}} </td>
            <td>{{number_format($pendingOrder->shoe_price*$pendingOrder->order_quantity,2)}}</td>
            <td>{{$pendingOrder->order_date}} </td>
            <td>{{$pendingOrder->pickup_date}} </td>
            <?php
                
                $current_date = Carbon::now()->format('Y-m-d');
                $current_date_string=Carbon::parse($current_date);
                $daysToAdd = 1;
                $cancel_checker = $current_date_string->addDays($daysToAdd);
            ?>
            @if ($cancel_checker==$pendingOrder->order_date)
            <td><a href="#" class="btn btn-danger">Cancel</a></td>
            @else
            <td>Order Being Processed</td>
            @endif
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
