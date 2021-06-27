@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">Stock Index</h2>
            @php $i = 1; @endphp
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Shoe</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Size(US)</th>
                        <th scope="col">Stocks</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($stocks as $stock)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$stock->brand}}</td>
                        <td><a href="/s/{{$stock->brand_slug}}/{{$stock->shoe_slug}}">{{$stock->shoe}}</a></td>
                        <td>{{$stock->sku}}</td>
                        <td>{{$stock->size}}</td>
                        <td>{{$stock->stock}}</td>
                    </tr>
                @php $i += 1; @endphp
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection