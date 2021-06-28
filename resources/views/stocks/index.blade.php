@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Stock Index</h2>
            <a href='/stocks/create'>
                <button class="btn btn-primary btn-xs float-right">Add</button>
            </a>
            <br>
            @php $i = 1; @endphp
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Shoe</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Stocks</th>
                        <th scope="col" class="col-md-2">Action</th>
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
                                <button class="btn btn-success btn-xs">Show</button>
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
