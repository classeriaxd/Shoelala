@extends('layouts.layout')

@section('content')
<?php       
use App\Http\Controllers\HomeController;
$cartTotal=HomeController::cartCount();
$pendingTotal=HomeController::pendingCount();
$completedTotal=HomeController::completedCount();
$cancelledTotal=HomeController::cancelledCount();
$expiredTotal=HomeController::expiredCount();
?>
<div id="main-container" class="container" style="margin-top: 150px;">
    <div class="card mb-2" style="width: 100%">
        <div class="row justify-content-center">
            <div class="col-md-12">
        @role('Super Admin')
                <h3 class="display-4 text-center mt-2">Currently logged as {{Auth::user()->first_name}}</h3>
                <h6 class="text-muted text-center">Super Admin</h6>
                <hr>
                <h6 class="display-6 text-center">What do you want to do for today?</h6>
            {{-- Collapse Buttons --}}
                <div class="row justify-content-center mb-1"> 
                    <a class="btn btn-outline-dark mr-5" data-toggle="collapse" href="#collapseOrders" role="button" aria-expanded="false" aria-controls="collapseOrders">
                    Orders
                    </a>
                    <a class="btn btn-outline-dark mr-5" data-toggle="collapse" href="#collapseStocks" role="button" aria-expanded="false" aria-controls="collapseStocks">
                    Stocks
                    </a>
                    <a class="btn btn-outline-dark mr-5" data-toggle="collapse" href="#collapseReports" role="button" aria-expanded="false" aria-controls="collapseReports">
                    Reports
                    </a>
                    <a class="btn btn-outline-dark" data-toggle="collapse" href="#collapseMaintenance" role="button" aria-expanded="false" aria-controls="collapseMaintenance">
                    Maintenance
                    </a>
                </div>
            {{-- Orders --}}
                <div class="row justify-content-center mb-2"> 
                    <div class="collapse" id="collapseOrders">
                        <a class="btn btn-link" href="/orders/scan">Scan QR</a>
                        <a class="btn btn-link" href="/orders">View Orders</a>
                        <a class="btn btn-link" href="/orders/e">Tag Overdue Orders</a>
                    </div>
                </div>
            {{-- Stocks --}}
                <div class="row justify-content-center mb-2"> 
                    <div class="collapse" id="collapseStocks">
                        <div class="d-flex flex-column text-center">
                            <p class="mb-1">Stocks</p>
                            <a class="btn btn-link mb-1" href="/stocks">View Stocks</a>
                            <hr>
                            <p class="mb-1">Brands</p>
                            <a class="btn btn-link mb-1" href="/b">View Brands</a>
                            <a class="btn btn-link mb-1" href="/b/create">Add Brand</a>
                            <hr>
                            <p class="mb-1">Shoes</p>
                            <a class="btn btn-link mb-1" href="/s">View Shoes</a>
                            <a class="btn btn-link mb-1" href="/s/create">Add Shoes</a>
                        </div>
                    </div>
                </div>
            {{-- Reports --}}
                <div class="row justify-content-center mb-2"> 
                    <div class="collapse" id="collapseReports">
                        <a class="btn btn-link" href="/reports/orders">Order Report</a>
                        <a class="btn btn-link" href="#">Stock Report</a>
                        <a class="btn btn-link" href="#">User Report</a>
                    </div>
                </div>
            {{-- Maintenance --}}
                <div class="row justify-content-center mb-2"> 
                    <div class="collapse" id="collapseMaintenance">
                        <div class="d-flex flex-column text-center">
                            <p class="mb-1">Users</p>
                            <a class="btn btn-link mb-1" href="/maintenance/users">Manage Users</a>
                            <hr>
                            <p class="mb-1">Orders</p>
                            <a class="btn btn-link mb-1" href="/orders/e">Tag Overdue Orders</a>
                            <hr>
                            <p class="mb-1">Restore</p>
                            <a class="btn btn-link mb-1" href="/s/restore-index">Shoes</a>
                            <a class="btn btn-link mb-1" href="/b/restore-index">Brands</a>
                        </div>
                    </div>
                </div>

        @elserole('Admin')
                    <h3 class="display-4 text-center mt-2">Currently logged as {{Auth::user()->first_name}}</h3>
                    <h6 class="text-muted text-center">Cashier</h6>
                    <hr>
                    <h6 class="display-6 text-center">What do you want to do for today?</h6>
            {{-- Collapse Buttons --}}
                    <div class="row justify-content-center">
                        <a class="btn btn-outline-dark mr-5" data-toggle="collapse" href="#collapseOrders-cashier" role="button" aria-expanded="false" aria-controls="collapseOrders-cashier">
                        Orders
                        </a>
                        <a class="btn btn-outline-dark" data-toggle="collapse" href="#collapseStocks-cashier" role="button" aria-expanded="false" aria-controls="collapseStocks-cashier">
                        Stocks
                        </a>
                    </div>  
            {{-- Orders --}}  
                    <div class="row justify-content-center mb-2">
                        <div class="collapse" id="collapseOrders-cashier">
                            <a class="btn btn-link" href="/orders">Pending Orders of this week</a>
                            <a class="btn btn-link" href="/orders/scan">Scan QR</a>
                            <a class="btn btn-link mb-1" href="/orders/e">Tag Overdue Orders</a>
                        </div>
                    </div>
            {{-- Stocks --}}
                    <div class="row justify-content-center mb-2">
                        <div class="collapse" id="collapseStocks-cashier">
                            <a class="btn btn-link" href="/stocks">View Stocks</a>
                        </div>
                    </div>

        @elserole('User')
                    <h3 class="display-4 text-center mt-2">Currently logged as {{Auth::user()->first_name}}</h3>
                    <h6 class="text-muted text-center">User</h6>
                    <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           Your Cart ({{$cartTotal}})
                            </button>
                        </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                        @if ($cartlist->count()>0)
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
                                </tr>
                            </tbody>
                        </table>
                        @endforeach
                        </div>
                        <div class="row justify-content-center pt-1">
                            <a href="/c/cartlist" class="btn btn-success">Go to Cart</a> 
                        </div> 
                        @else
                        <h2>There are no items in your cart.</h2>
                        <div class="row justify-content-center pt-1">
                            <a href="/s" class="btn btn-success">Shop Now</a> 
                        </div> 
                        @endif
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Pending Orders ({{$pendingTotal}})
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        @if ($pendingOrders->count()>0)
                        @foreach ($pendingOrders as $pendingOrder)
                        <div class="card">
                            <div class="card-header">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td scope="col">Order Number </td>
                                            <td scope="col">Order Code </td>
                                            <td scope="col"> QR Code</td>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$pendingOrder->order_uuid}}</td>
                                            <td>{!! QrCode::size(250)
                                                ->format('svg')
                                                //->gradient(36, 161, 229, 110, 250, 205, 'vertical')
                                                //->backgroundColor(255,55,0)
                                                ->style('round')
                                                ->eye('circle')
                                                ->generate("http://127.0.0.1:8000/orders/o/$pendingOrder->order_uuid"); !!}</td>
                                        </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                            @endforeach
                            <div class="row justify-content-center pt-1">
                                <a href="/c/pendingOrders" class="btn btn-success">Go to Pending Orders</a> 
                            </div> 
                            </div>
                            @else
                            <h4 class="text-center">There are no items in your cart.</h4>
                            <div class="row justify-content-center pt-1">
                                <a href="/s" class="btn btn-success">Shop Now</a> 
                            </div> 
                            @endif
                         </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Completed Orders ({{$completedTotal}})
                            </button>
                        </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                @if ($completedOrders->count()>0)
                                @foreach ($completedOrders as $completedOrder)
                                    <div class="card">
                                        <div class="card-header">
                                        <table class="table table-hover">
                                            <thead>
                                            </div>
                                            <tr>
                                            <td scope="col">Order Number </td>
                                            <td scope="col">Order Code </td>
                                            <td scope="col"> QR Code</td>
                                            </tr>
                                            
                                            <tr></tr>
                                            
                                            <tr>
                                            <td scope="row">{{$loop->iteration}}</td>
                                            <td>{{$completedOrder->order_uuid}}</td>
                                            <td>{!! QrCode::size(250)
                                                                ->format('svg')
                                                                //->gradient(36, 161, 229, 110, 250, 205, 'vertical')
                                                                //->backgroundColor(255,55,0)
                                                                ->style('round')
                                                                ->eye('circle')
                                                                ->generate("http://127.0.0.1:8000/orders/o/$completedOrder->order_uuid"); !!}</td>
                                            </tr>
                                        
                                        </tbody>
                                        </table>
                                    </div>
                                @endforeach
                                        <div class="row justify-content-center pt-1">
                                            <a href="/c/completedOrders" class="btn btn-success">Go to Completed Orders</a> 
                                        </div> 
                                    </div>
                                    @else
                                    <h4 class="text-center">There are no items in your cart.</h4>
                                    <div class="row justify-content-center pt-1">
                                        <a href="/s" class="btn btn-success">Shop Now</a> 
                                    </div> 
                                    @endif
                            </div>
                            </div>
                            <div class="card">
                            <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Expired Orders ({{$expiredTotal}})
                                </button>
                            </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                            @if ($expiredOrders->count()>0)
                            @foreach ($expiredOrders as $expiredOrder)
                            <div class="card">
                            <div class="card-header">
                            <table class="table table-hover">
                                <thead>
                                </div>
                                <tr>
                                <td scope="col">Order Number </td>
                                <td scope="col">Order Code </td>
                                <td scope="col"> QR Code</td>
                                </tr>
                                </thead>
                                
                                <tbody>
                                <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$expiredOrder->order_uuid}}</td>
                                <td>{!! QrCode::size(250)
                                    ->format('svg')
                                    //->gradient(36, 161, 229, 110, 250, 205, 'vertical')
                                    //->backgroundColor(255,55,0)
                                    ->style('round')
                                    ->eye('circle')
                                    ->generate("http://127.0.0.1:8000/orders/o/$expiredOrder->order_uuid"); !!}</td>
                                </tr>
                            
                            </tbody>
                            </table>
                            </div>
                            @endforeach
                            <div class="row justify-content-center pt-1">
                                            <a href="/c/expiredOrders" class="btn btn-success">Go to Expired Orders</a> 
                            </div> 
                            </div>
                            @else
                            <h2>There are no items in your cart.</h2>
                            <div class="row justify-content-center pt-1">
                                <a href="/s" class="btn btn-success">Shop Now</a> 
                            </div> 
                            @endif
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Cancelled Orders ({{$cancelledTotal}})
                                </button>
                            </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                            <div class="card-body">
                            @if ($cancelledOrders->count()>0)
                            @foreach ($cancelledOrders as $cancelledOrder)
                            <div class="card">
                            <div class="card-header">
                            <table class="table table-hover">
                                <thead>
                                </div>
                                <tr>
                                <td scope="col">Order Number </td>
                                <td scope="col">Order Code </td>
                                <td scope="col"> QR Code</td>
                                </tr>
                                </thead>
                                
                                <tbody>
                                <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$cancelledOrder->order_uuid}}</td>
                                <td>{!! QrCode::size(250)
                                    ->format('svg')
                                    //->gradient(36, 161, 229, 110, 250, 205, 'vertical')
                                    //->backgroundColor(255,55,0)
                                    ->style('round')
                                    ->eye('circle')
                                    ->generate("http://127.0.0.1:8000/orders/o/$cancelledOrder->order_uuid"); !!}</td>
                                
                                </tr>
                            
                            </tbody>
                            </table>
                            </div>
                            @endforeach
                            <div class="row justify-content-center pt-1">
                                            <a href="/c/cancelledOrders" class="btn btn-success">Go to Cancelled Orders</a> 
                            </div> 
                            </div>
                            @else
                            <h2>There are no items in your cart.</h2>
                            <div class="row justify-content-center pt-1">
                                <a href="/s" class="btn btn-success">Shop Now</a> 
                            </div> 
                            @endif                  
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
        @endrole
            </div>
        </div>
    </div>
</div>
@endsection
