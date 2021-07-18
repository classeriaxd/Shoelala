@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="display-1 text-center mt-1">Expired Orders</h2>
            <a href="/orders">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
            <hr>    
                @php $i= 1; @endphp
@if($expired_orders->count() > 0)            
            <div>
                <table class="table-hover w-100 text-center">
                    <thead class="thead-dark table-bordered">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Buyer</th>
                            <th scope="col">Pickup Date</th>
                            <th scope="col">Days Late</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($expired_orders as $order)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td>{{$order->user_fullName}}</td>
                        <td>{{strftime("%B %e, %Y",strtotime($order->pickup_date))}}</td>
                        <td>{{$order->days_late}}</td>
                        <td>
                            <form action="{{route('order.expired', [$order->order_uuid,])}}" method="POST">
                                @csrf
                                <button class="btn btn-danger">Tag as Expired</button>
                            </form>
                        </td>
                    </tr>
                @php $i += 1; @endphp    
                @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="text-center">
                <h4 class="mb-2">Quick Option</h4>
                <form action="{{route('order.all_expired')}}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Tag all orders as Expired</button>
                </form>
            </div>
@else
            <div class="text-center">
                <h4 class="mb-2">No expired orders!</h4>
            </div>
@endif
            <hr>
        </div>
    </div>
</div>
@endsection
