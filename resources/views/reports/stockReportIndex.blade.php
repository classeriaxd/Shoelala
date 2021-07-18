@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="display-4 text-center mt-4">Stock Reports</h3>
        {{-- Quarter Buttons --}}
            <div class="row text-center">
                <div class="col ">
                    <form action="{{route('stockreport.show')}}" method="POST">
                        @csrf
                        <button class="btn btn-primary w-100 h-100" name="no" value="no" type="submit">No Stocks</button>
                    </form>
                </div>
                <div class="col">
                    <form action="{{route('stockreport.show')}}" method="POST">
                        @csrf
                        <button class="btn btn-primary w-100 h-100" name="low" value="low" type="submit">Low Stocks</button>
                    </form>
                </div>
                <div class="col">
                    <form action="{{route('stockreport.show')}}" method="POST">
                        @csrf
                        <button class="btn btn-primary w-100 h-100" name="high" value="high" type="submit">High Stocks</button>
                    </form>
                </div>
                <div class="col">
                    <form action="{{route('stockreport.show')}}" method="POST">
                        @csrf
                        <button class="btn btn-primary w-100 h-100" name="all" value="all" type="submit">All Stocks</button>
                    </form>
                </div>                          
            </div>
        </div>
    </div>
</div>
@endsection
