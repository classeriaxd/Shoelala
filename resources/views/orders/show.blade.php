@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-1 text-center">Order Details</h2>
            <div class="card">
                <div class="card-header text-center">Order</div>
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title">Buyer Details</h5>
                            <p>Buyer: {{$userDetails->user_fullName}}</p>
                            <p>Order Date: {{strftime("%B %e, %Y",strtotime($userDetails->order_date))}}</p>
                            <p>Pickup Date: {{strftime("%B %e, %Y",strtotime($userDetails->pickup_date))}}</p>
                        @if($userDetails->status == 1)
                            <p>Status: <span style="color: ORANGE">PENDING</span></p>
                        @elseif($userDetails->status == 2)
                            <p>Status: <span style="color: GREEN">COMPLETED</span></p>
                            <p>Completed On: {{strftime("%B %e, %Y",strtotime($userDetails->completed_date))}}</p>
                        @elseif($userDetails->status == 3)
                            <p>Status: <span style="color: RED">CANCELLED</span></p>
                        @elseif($userDetails->status == 4)
                            <p>Status: <span style="color: RED">EXPIRED</span></p>
                        @endif
                    </div>
                    <hr>
                    <div class="text-center">
                        <h5 class="card-title">Order Details</h5>
                        <small>Order#{{$userDetails->order_uuid}}</small>
                        <hr>
                        @foreach($orderItems as $orderItem)
                            <p>Shoe: {{$orderItem->shoe_name}}</p>
                            <small>{{$orderItem->brand_name}}</small>
                            <p>Size(US): {{$orderItem->size_us}}</p>
                            <p>Price: {{$orderItem->unit_price}}</p>
                            <p>Quantity: {{$orderItem->quantity}}</p>
                            <u><h5>Subtotal: {{$orderItem->subtotal}}</h5></u>
                            <hr>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <h5 class="card-title text-center">Total Amount Due</h5>
                        <h4 class="text-center" style="text-decoration-line:underline; text-decoration-style:double;">₱ {{$totalAmount}}</h4>
                    </div>
                @if($userDetails->status == 1)
                    <div class="text-center">
                        <form action="/orders/o/{{$userDetails->order_uuid}}" method="POST">
                            @csrf
                            <button class="btn btn-primary">Confirm Order</button>
                        </form>
                        </a>
                    </div>
                @endif
                </div>
            </div>
            <hr>
            <a href="/orders">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
        </div>
    </div>
</div>
@endsection
