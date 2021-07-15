@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="display-2 text-center mt-3">Order Index</h2>
            <a href="/home">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
@role('Super Admin')            
            <div>
                <a href="/orders/scan" class="mb-2">
                     <button class="btn btn-primary col-md-12 btn-lg mb-2">Scan QR</button>
                 </a>
                 <a href="/orders/e">
                     <button class="btn btn-primary col-md-12 btn-lg">Tag Expired Orders</button>
                 </a>
            </div>
            @php $i= 1; @endphp
            <hr>
            <div id="pendingOrdersTable" class="mt-4">
                @if($pendingOrders->count() > 0)   
                <u><h4 class="text-center mt-2">Pending Orders</h4></u>
                <table class="table-hover table-bordered w-100 text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Buyer</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Pickup Date</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($pendingOrders as $pendingOrder)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td scope="row">{{$pendingOrder->buyer_fullName}}</td>
                        <td scope="row">{{strftime("%B %e, %Y",strtotime($pendingOrder->order_date))}}</td>
                        <td scope="row">{{strftime("%B %e, %Y",strtotime($pendingOrder->pickup_date))}}</td>
                    </tr>
                @php $i += 1; @endphp
                @endforeach
                    </tbody>
                </table>

                @else
                <u><h4 class="text-center mt-2">No Pending Orders</h4></u>
                @endif

            </div>
            @php $i= 1; @endphp
            <hr>
            <div id="completedOrdersTable" class="mt-3">
                @if($completedOrders->count() > 0)
                <u><h4 class="text-center mt-2">Completed Orders</h4></u>
                <table class="table-hover table-bordered w-100 text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Buyer</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Completed Date</th>
                            <th scope="col">Completed By</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($completedOrders as $completedOrder)
                        <tr>
                            <td scope="row">{{$i}}</td>
                            <td>{{$completedOrder->buyer_fullName}}</td>
                            <td>{{strftime("%B %e, %Y",strtotime($completedOrder->order_date))}}</td>
                            <td>{{strftime("%B %e, %Y",strtotime($completedOrder->completed_date))}}</td>
                            <td>{{$completedOrder->reciever_fullName}}</td>
                        </tr>
                    @php $i += 1; @endphp
                    @endforeach
                    </tbody>
                </table>
                @else
                <u><h4 class="text-center mt-2">No Completed Orders</h4></u>
                @endif
            </div>
            @php $i= 1; @endphp
            <hr>
            <div id="cancelledOrdersTable" class="mt-3">
                @if($cancelledOrders->count() > 0)
                <u><h4 class="text-center mt-2">Cancelled Orders</h4></u>
                <table class="table-hover table-bordered w-100 text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Buyer</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Cancel Date</th>
                        </tr>
                    <tbody>
                    @foreach($cancelledOrders as $cancelledOrder)
                        <tr>
                            <td scope="row">{{$i}}</td>
                            <td>{{$cancelledOrder->buyer_fullName}}</td>
                            <td>{{strftime("%B %e, %Y",strtotime($cancelledOrder->order_date))}}</td>
                            <td>{{strftime("%B %e, %Y",strtotime($cancelledOrder->cancel_date))}}</td>
                        </tr>
                    @php $i += 1; @endphp
                    @endforeach
                    </tbody>
                    </thead>
                </table>
                @else
                <u><h4 class="text-center mt-2">No Cancelled Orders</h4></u>
                @endif
            </div>
            @php $i= 1; @endphp
            <hr>
            <div id="expiredOrdersTable" class="mt-3">
                @if($expiredOrders->count() > 0)
                <u><h4 class="text-center mt-2">Expired Orders</h4></u>
                <table class="table-hover table-bordered w-100 text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Buyer</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Tag Date</th>
                            <th scope="col">Completed By</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($expiredOrders as $expiredOrder)
                        <tr>
                            <td scope="row">{{$i}}</td>
                            <td>{{$expiredOrder->buyer_fullName}}</td>
                            <td>{{strftime("%B %e, %Y",strtotime($expiredOrder->order_date))}}</td>
                            <td>{{strftime("%B %e, %Y",strtotime($expiredOrder->completed_date))}}</td>
                            <td>{{$expiredOrder->reciever_fullName}}</td>
                        </tr>
                    @php $i += 1; @endphp
                    @endforeach
                    </tbody>
                </table>
                @else
                <u><h4 class="text-center mt-2">No Expired Orders</h4></u>
                @endif
            </div>
@elserole('Admin')
            <div>
                <a href="/orders/scan" class="mb-2">
                    <button class="btn btn-primary col-md-12 btn-lg mb-2">Scan QR</button>
                </a>
                <a href="/orders/e">
                    <button class="btn btn-primary col-md-12 btn-lg">Tag Expired Orders</button>
                </a>
            </div>
            @php $i= 1; @endphp
            <hr>
            <div id="pendingOrdersTable" class="mt-4">
                @if($pendingOrders->count() > 0)
                <u><h4 class="text-center mt-2">Pending Orders of the week</h4></u>
                <table class="table-hover table-bordered w-100 text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Buyer</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Pickup Date</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($pendingOrders as $pendingOrder)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td scope="row">{{$pendingOrder->buyer_fullName}}</td>
                        <td scope="row">{{strftime("%B %e, %Y",strtotime($pendingOrder->order_date))}}</td>
                        <td scope="row">{{strftime("%B %e, %Y",strtotime($pendingOrder->pickup_date))}}</td>
                    </tr>
                @php $i += 1; @endphp
                @endforeach
                    </tbody>
                </table>
                @else
                <u><h4 class="text-center mt-2">No Pending Orders for this week</h4></u>
                @endif
            </div>
@endrole
            <hr>
        </div>
    </div>
</div>
@endsection
