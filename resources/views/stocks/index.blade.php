@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Stock Index</h2>
            <a href="/home">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
            <a href='/stocks/create'>
                <button class="btn btn-primary col-md-12 btn-lg">Add</button>
            </a>
            <br>
            <br>
            @php $i = 1; @endphp
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="col-md-2 text-center">#</th>
                        <th scope="col" class="col-md-2 text-center">Brand</th>
                        <th scope="col" class="col-md-2 text-center">Shoe</th>
                        <th scope="col" class="col-md-2 text-center">SKU</th>
                        <th scope="col" class="col-md-2 text-center">Stocks</th>
                        <th scope="col" class="col-md-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($stocks as $stock)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$stock->brand}}</td>
                        <td><a href="/s/{{$stock->brand_slug}}/{{$stock->shoe_slug}}">{{$stock->shoe}}</a></td>
                        <td>{{$stock->sku}}</td>
                        <td>{{$stock->stock}}</td>
                        <td>
                        <a href='/stocks/{{$stock->brand_slug}}/{{$stock->shoe_slug}}'>
                                <button class="col-md-12 btn btn-success btn-md">Show</button>
                        </a>
                        </td>
                    </tr>
                @php $i += 1; @endphp
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
