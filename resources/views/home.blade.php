@extends('layouts.layout')

@section('content')
<div id="main-container" class="container" style="margin-top: 200px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @role('Super Admin')
            <h3 class="display-4 text-center">Welcome Super Admin</h3>
            <br>
            <h6 class="display-6 text-center">What do you want to do for today?</h6>
            <div class="row justify-content-center">
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
            <div class="row justify-content-center">
                <div class="collapse" id="collapseOrders">
                    <a class="btn btn-link" href="/orders">Verify Order</a>
                    <a class="btn btn-link" href="/orders">View all Orders</a>
                </div>
                <div class="collapse" id="collapseStocks">
                    <a class="btn btn-link" href="">Link</a>
                    <a class="btn btn-link" href="">Link</a>
                    <a class="btn btn-link" href="">Link</a>
                    <a class="btn btn-link" href="">Link</a>
                </div>
                <div class="collapse" id="collapseReports">
                    <a class="btn btn-link" href="">Link</a>
                    <a class="btn btn-link" href="">Link</a>
                    <a class="btn btn-link" href="">Link</a>
                    <a class="btn btn-link" href="">Link</a>
                </div>
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
                        <a href="/s">
                            <button class="btn btn-primary">All Shoes</button>
                        </a>
                        <a href="/b">
                            <button class="btn btn-primary">All Brands</button>
                        </a>
                    </div>
                </div>
            @endrole
        </div>
    </div>
</div>
@endsection
