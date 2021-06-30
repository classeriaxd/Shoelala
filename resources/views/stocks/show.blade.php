@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-2 text-center">{{$brand->name}}</h2>
            <h5 class="display-4 text-center">{{$shoe->name}}</h5>
            @php $i = 1; @endphp
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type</th>
                        <th scope="col">Size</th>
                        <th scope="col">Stocks</th>
                        <th scope="col" class="col-md-2">Action</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($stocks as $stock)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$stock->type}}</td>
                        <td>{{$stock->size}}</td>
                        <td>{{$stock->stock}}</td>
                        <td>
                    
                        <a href='/stocks/{{$stock->brand_slug}}/{{$stock->shoe_slug}}/{{$stock->size_id}}/edit'>
                                <button class="btn btn-primary btn-xs">Edit</button>
                        </a>
                        <form method="POST" action="{{route('stocks.destroy', [$brand->slug, $shoe->slug, $stock->size_id])}}" >
                            @method('DELETE')
                            @csrf
                            <input type = "hidden" name="id" value ='{{$stock->size_id}}'>
                            <button class="btn btn-danger btn-xs">Delete</button>
                        </form>
                    
                        </td>
                    </tr>
                @php $i += 1; @endphp
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
        <div class="row justify-content-center pt-1">
            <a href="/stocks">
                <button class="btn btn-secondary">Go back</button>
            </a>
        </div>
</div>
@endsection
