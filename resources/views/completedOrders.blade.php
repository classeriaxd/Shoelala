@extends('layouts.layout')

@section('content')
<?php
use Carbon\Carbon;
?>
<div class="container">
   <div class="row">
        <div id="main-container" class="container">
        <h1>Completed Orders</h1>
        @if ($completedOrders->count()>0)
        @foreach ($completedOrders as $completedOrder)
        <div class="card">
        <div class="card-header">
        <table class="table table-hover">
            <thead>
            </div>
            <tr>
            <td scope="col">Order Code </td>
            <td scope="col">Action</td>
            </tr>
            
            <tr></tr>
            
            <tr>
            <td>{{$completedOrder->order_uuid}}</td>
            <td><a href="/c/completedOrders/{{$completedOrder->order_uuid}}" class="btn btn-success">View</a> </td>
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
