@extends('layouts.layout')

@section('content')

<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-1 text-center">Restore Index</h2>
            <a href="/home">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
        	<br>
            <br>
            @php $i = 1; @endphp
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="col-md-2 text-center">#</th>
                        <th scope="col" class="col-md-2 text-center">Name</th>
                        <th scope="col" class="col-md-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($brands as $brand)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->sku}}</a></td>
                        <td>{{$brand->description}}</td>
                        <td>
                        <a href='/b/restore-brand/{{$brand->slug}}'>
                                <button class="col-md-12 btn btn-success btn-md">Restore</button>
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



