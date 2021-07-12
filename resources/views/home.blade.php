@extends('layouts.layout')

@section('content')
<div id="main-container" class="container" style="margin-top: 150px;">
    <div class="card mb-2" style="width: 100%">
        <div class="row justify-content-center">
            <div class="col-md-12">
        @role('Super Admin')
                <h3 class="display-4 text-center">Currently logged as {{Auth::user()->first_name}}</h3>
                <small>Super Admin</small>
                <hr>

                <h6 class="display-6 text-center">What do you want to do for today?</h6>
                <div class="row justify-content-center"> {{-- Collapse Buttons --}}
                    <a class="btn btn-outline-link mr-5" data-toggle="collapse" href="#collapseOrders" role="button" aria-expanded="false" aria-controls="collapseOrders">
                    Orders
                    </a>
                    <a class="btn btn-outline-link mr-5" data-toggle="collapse" href="#collapseStocks" role="button" aria-expanded="false" aria-controls="collapseStocks">
                    Stocks
                    </a>
                    <a class="btn btn-outline-link mr-5" data-toggle="collapse" href="#collapseReports" role="button" aria-expanded="false" aria-controls="collapseReports">
                    Reports
                    </a>
                    <a class="btn btn-outline-link" data-toggle="collapse" href="#collapseMaintenance" role="button" aria-expanded="false" aria-controls="collapseMaintenance">
                    Maintenance
                    </a>
                </div>

                <br>

                <div class="row justify-content-center mb-2"> {{-- Orders --}}
                    <div class="collapse" id="collapseOrders">
                        <a class="btn btn-link" href="/orders/scan">Scan QR</a>
                        <a class="btn btn-link" href="/orders">View Orders</a>
                        <a class="btn btn-link" href="#">Tag Overdue Orders</a>
                    </div>
                </div>
                <div class="row justify-content-center mb-2"> {{-- Stocks --}}
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
                <div class="row justify-content-center mb-2"> {{-- Reports --}}
                    <div class="collapse" id="collapseReports">
                        <a class="btn btn-link" href="#">Order Report</a>
                        <a class="btn btn-link" href="#">Stock Report</a>
                        <a class="btn btn-link" href="#">User Report</a>
                    </div>
                </div>
                <div class="row justify-content-center mb-2"> {{-- Maintenance --}}
                    <div class="collapse" id="collapseMaintenance">
                        <div class="d-flex flex-column text-center">
                            <p class="mb-1">Users</p>
                            <a class="btn btn-link mb-1" href="#">Manage Users</a>
                            <a class="btn btn-link mb-1" href="#">Manage Roles</a>
                            <hr>
                            <p class="mb-1">Orders</p>
                            <a class="btn btn-link mb-1" href="#">Tag Overdue Orders</a>
                            <hr>
                            <p class="mb-1">Restore</p>
                            <a class="btn btn-link mb-1" href="#">Shoes</a>
                            <a class="btn btn-link mb-1" href="#">Brands</a>
                        </div>
                    </div>
                </div>

        @elserole('Admin')
                    <h3 class="display-4 text-center">Currently logged as {{Auth::user()->first_name}}</h3>
                    <small>Cashier</small>
                    <hr>
                    <h6 class="display-6 text-center">What do you want to do for today?</h6>
                    <div class="row justify-content-center"> {{-- Collapse Buttons --}}
                        <a class="btn btn-outline-link mr-5" data-toggle="collapse" href="#collapseOrders-cashier" role="button" aria-expanded="false" aria-controls="collapseOrders-cashier">
                        Orders
                        </a>
                        <a class="btn btn-outline-link mr-5" data-toggle="collapse" href="#collapseStocks-cashier" role="button" aria-expanded="false" aria-controls="collapseStocks-cashier">
                        Stocks
                        </a>
                    </div>    
                    <div class="row justify-content-center mb-2"> {{-- Orders --}}
                        <div class="collapse" id="collapseOrders-cashier">
                            <a class="btn btn-link" href="#">Pending Orders of this week</a>
                            <a class="btn btn-link" href="#">Scan QR</a>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2"> {{-- Stocks --}}
                        <div class="collapse" id="collapseOrders-cashier">
                            <a class="btn btn-link" href="#">View Stocks</a>
                        </div>
                    </div>

        @elserole('User')
                    <h3 class="display-4 text-center">Currently logged as {{Auth::user()->first_name}}</h3>
                    <small>User</small>
                        <div class="card">
                            <div class="card-header">Choices</div>
                            <div class="card-body text-center">
                                <a href="/shop">
                                    <button class="btn btn-primary">View Shop</button>
                                </a>
                                <a href="/b">
                                    <button class="btn btn-primary">View Cart</button>
                                </a>
                            </div>
                        </div>
        @endrole
            </div>
        </div>
    </div>
</div>
@endsection
