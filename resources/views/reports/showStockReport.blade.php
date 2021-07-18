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
                        <th scope="col" colspan="3" style="color: white;">OUT OF STOCK</th>  
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
            <br>
            <table class="table-striped table-bordered text-center w-100 mb-1">
                <thead class="thead-dark">
                    <tr class="bg-warning">
                        <th scope="col" colspan="4" style="color: white;">LOW STOCKS</th>  
                    </tr>
                </thead>
            @if($TotalLowStocks->count() > 0)
                @foreach ($TotalLowStocks as $shoe)
                <tr>
                    <th scope="col" colspan="4">{{$shoe->shoe}}</th>
                </tr>
                <tbody>
                <tr class="bg-dark" style="color: white;">
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col">Size</th>
                    <th scope="col">Stocks</th>
                </tr>
                @php $i = 1; @endphp
            @foreach($LowStocks as $stock)
                @if ($shoe->shoe_id == $stock->shoe_id)
                <tr>
                    <td scope="row">{{$i}}</td>
                    <td scope="row">{{$stock->type}}</td>
                    <td scope="row">{{$stock->size}}</td>
                    <td scope="row">{{$stock->stock}}</td>
                </tr>
                @php $i += 1; @endphp
                @endif
            @endforeach
                <tr>
                    <th scope="col">Total:</th>
                    <th></th>
                    <th></th>
                    <th scope="col">{{$shoe->stock}}</th>
                </tr>
                @endforeach
                </tbody>
            @else
                <tbody>
                    <tr>
                        <td scope="row" colspan="4">NO STOCKS FOUND</td>
                    </tr>
                </tbody>
            @endif
            </table>
            <br>
            <table class="table-striped table-bordered text-center w-100 mb-1">
                <thead class="thead-dark">
                    <tr class="bg-success">
                        <th scope="col" colspan="4" style="color: white;">HIGH STOCKS</th>  
                    </tr>
                </thead>
            @if($TotalHighStocks->count() > 0)
                @foreach ($TotalHighStocks as $shoe)
                <tr>
                    <th scope="col" colspan="4">{{$shoe->shoe}}</th>
                </tr>
                <tbody>
                <tr class="bg-dark" style="color: white;">
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col">Size</th>
                    <th scope="col">Stocks</th>
                </tr>
                @php $i = 1; @endphp
                @foreach($HighStocks as $stock)
                @if ($shoe->shoe_id == $stock->shoe_id)
                <tr>
                    <td scope="row">{{$i}}</td>
                    <td scope="row">{{$stock->type}}</td>
                    <td scope="row">{{$stock->size}}</td>
                    <td scope="row">{{$stock->stock}}</td>
                </tr>
                @php $i += 1; @endphp
                @endif
                @endforeach
                <tr>
                    <th scope="col">Total:</th>
                    <th></th>
                    <th></th>
                    <th scope="col">{{$shoe->stock}}</th>
                </tr>
                @endforeach
                </tbody>
            @else
                <tbody>
                    <tr>
                        <td scope="row" colspan="4">NO STOCKS FOUND</td>
                    </tr>
                </tbody>
            @endif
            </table>
        </div>
    </div>
</div>
@endsection
