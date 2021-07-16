@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <h3 class="display-4 text-center mt-4">ORDER REPORT</h3>
            <h3 class="display-5 text-center mt-1">{{$startDate.' - '.$endDate}}</h3>
            <hr>
        {{-- PENDING ORDERS --}}
            @php $i = 1; @endphp
            <table class="table-striped table-bordered text-center w-100 mb-1">
                <thead class="thead-dark">
                    <tr class="bg-primary">
                        <th scope="col" colspan="3" style="color: white;">PENDING ORDERS</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-dark" style="color: white;">
                        <th scope="col">#</th>
                        <th scope="col">USER</th>
                        <th scope="col">ORDER DATE</th>
                    </tr>
            @if($pendingOrders->count() > 0)
                @foreach($pendingOrders as $order)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td scope="row">{{$order->user_fullName}}</td>
                        <td scope="row">{{$order->order_date}}</td>
                    </tr>
                @php $i += 1; @endphp
                @endforeach
            @else
                    <tr>
                        <td scope="row" colspan="3">NO ORDERS FOUND</td>
                    </tr>
            @endif
                </tbody>
            </table>
            <hr>
        {{-- COMPLETED ORDERS --}}
            @php $i = 1; @endphp
            <table class="table-striped table-bordered text-center w-100 mt-1">
                <thead class="thead-dark">
                    <tr class="bg-success">
                        <th scope="col" colspan="4" style="color: white;">COMPLETED ORDERS</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-dark" style="color: white;">
                        <th scope="col">#</th>
                        <th scope="col">BUYER</th>
                        <th scope="col">COMPLETED DATE</th>
                        <th scope="col">RECIEVER</th>
                    </tr>
            @if($completedOrders->count() > 0)
                @foreach($completedOrders as $order)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td scope="row">{{$order->buyer_fullName}}</td>
                        <td scope="row">{{$order->completed_date}}</td>
                        <td scope="row">{{$order->reciever_fullName}}</td>
                    </tr>
                @php $i += 1; @endphp
                @endforeach
            @else
                    <tr>
                        <td scope="row" colspan="4">NO ORDERS FOUND</td>
                    </tr>
            @endif
                </tbody>
            </table>
            <hr>
        {{-- CANCELLED ORDERS --}}
            @php $i = 1; @endphp
            <table class="table-striped table-bordered text-center w-100 mb-1">
                <thead class="thead-dark">
                    <tr class="bg-danger">
                        <th scope="col" colspan="3" style="color: white;">CANCELLED ORDERS</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-dark" style="color: white;">
                        <th scope="col">#</th>
                        <th scope="col">USER</th>
                        <th scope="col">CANCEL DATE</th>
                    </tr>
            @if($cancelledOrders->count() > 0)
                @foreach($cancelledOrders as $order)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td scope="row">{{$order->user_fullName}}</td>
                        <td scope="row">{{$order->cancel_date}}</td>
                    </tr>
                @php $i += 1; @endphp
                @endforeach
            @else
                    <tr>
                        <td scope="row" colspan="3">NO ORDERS FOUND</td>
                    </tr>
            @endif
                </tbody>
            </table>
            <hr>
        {{-- EXPIRED ORDERS --}}
            @php $i = 1; @endphp
            <table class="table-striped table-bordered text-center w-100 mt-1">
                <thead class="thead-dark">
                    <tr class="bg-warning">
                        <th scope="col" colspan="4" style="color: white;">EXPIRED ORDERS</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-dark" style="color: white;">
                        <th scope="col">#</th>
                        <th scope="col">BUYER</th>
                        <th scope="col">TAG DATE</th>
                        <th scope="col">TAGGER</th>
                    </tr>
            @if($expiredOrders->count() > 0)
                @foreach($expiredOrders as $order)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td scope="row">{{$order->buyer_fullName}}</td>
                        <td scope="row">{{$order->tag_date}}</td>
                        <td scope="row">{{$order->tagger_fullName}}</td>
                    </tr>
                @php $i += 1; @endphp
                @endforeach
            @else
                    <tr>
                        <td scope="row" colspan="4">NO ORDERS FOUND</td>
                    </tr>
            @endif
                </tbody>
            </table>        
        </div>
    </div>
</div>
@endsection
