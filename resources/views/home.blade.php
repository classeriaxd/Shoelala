@extends('layouts.layout')

@section('content')

<div id="main-container" class="container" style="margin-top: 150px;">
    <div class="card mb-2" style="width: 100%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @role('Super Admin')
                <h3 class="display-2 text-center mt-3">Currently logged as {{Auth::user()->first_name}} Super Admin</h3>
                <hr>

                    <h6 class="display-6 text-center">What do you want to do for today?</h6>
                    <div class="row justify-content-center"> {{-- Collapse Buttons --}}
                        <a class="btn btn-link mr-5" data-toggle="collapse" href="#collapseOrders" role="button" aria-expanded="false" aria-controls="collapseOrders">
                        Orders
                        </a>
                        <a class="btn btn-link mr-5" data-toggle="collapse" href="#collapseStocks" role="button" aria-expanded="false" aria-controls="collapseStocks">
                        Stocks
                        </a>
                        <a class="btn btn-link mr-5" data-toggle="collapse" href="#collapseReports" role="button" aria-expanded="false" aria-controls="collapseReports">
                        Reports
                        </a>
                        <a class="btn btn-link" data-toggle="collapse" href="#collapseMaintenance" role="button" aria-expanded="false" aria-controls="collapseMaintenance">
                        Maintenance
                        </a>
                    </div>

            <br>

            <div class="row justify-content-center"> {{-- Orders --}}
                <div class="collapse" id="collapseOrders">
                    <a class="btn btn-link" href="/orders/scan">Scan QR</a>
                    <a class="btn btn-link" href="/orders">View Orders</a>
                </div>
            </div>
            <div class="row justify-content-center"> {{-- Stocks --}}
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
            <div class="row justify-content-center"> {{-- Reports --}}
                <div class="collapse" id="collapseReports">
                    <a class="btn btn-link" href="">Link</a>
                    <a class="btn btn-link" href="">Link</a>
                    <a class="btn btn-link" href="">Link</a>
                    <a class="btn btn-link" href="">Link</a>
                </div>
            </div>
            <div class="row justify-content-center"> {{-- Maintenance --}}
                <div class="collapse" id="collapseMaintenance">
                    <a class="btn btn-link" href="">Link</a>
                    <a class="btn btn-link" href="">Link</a>
                    <a class="btn btn-link" href="">Link</a>
                    <a class="btn btn-link" href="">Link</a>
                </div>
            </div>

            @elserole('Admin')
                <div class="card">
                    <div class="card-header">Choices</div>
                    <div class="card-body text-center">
                        <a href="/orders">
                            <button class="btn btn-primary">Orders</button>
                        </a>
                    </div>
                </div>
            @elserole('User')
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
                    @elserole('Admin')
                    <h3 class="display-2 text-center mt-2">Currently logged as {{Auth::user()->first_name}} Cashier</h3>
                        <div class="card">
                            <div class="card-header">Choices</div>
                            <div class="card-body text-center">
                                <a href="/orders">
                                    <button class="btn btn-primary">Orders</button>
                                </a>
                            </div>
                        </div>
                    @elserole('User')
                    <h3 class="display-2 text-center mt-2">Currently logged as {{Auth::user()->first_name}}</h3>
                        <div class="card">
                            <div class="card-header">Choices</div>
                            <div class="card-body text-center">
                                <a href="/shop">
                                    <button class="btn btn-primary">View Shop</button>
                                </a>
                                <a href="/c/cartlist">
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
