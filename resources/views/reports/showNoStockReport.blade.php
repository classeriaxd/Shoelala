@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <h3 class="display-4 text-center mt-4">STOCKS REPORT</h3>
            <hr>
            @php $i = 1; @endphp
            <table class="table-striped table-bordered text-center w-100 mb-1">
                <thead class="thead-dark">
                    <tr class="bg-danger">
                        <th scope="col" colspan="3" style="color: white;">NO STOCKS</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-dark" style="color: white;">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">SKU</th>
                    </tr>
            @if($NoStocks->count() > 0)
                @foreach($NoStocks as $stock)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td scope="row">{{$stock->name}}</td>
                        <td scope="row">{{$stock->sku}}</td>
                    </tr>
                @php $i += 1; @endphp
                @endforeach
            @else
                    <tr>
                        <td scope="row" colspan="3">EVERYTHING IS GUCCI</td>
                    </tr>
            @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
