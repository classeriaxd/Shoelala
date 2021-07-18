@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-1 text-center">Category Maintenance</h2>
            <a href="/home">
                <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
            </a>
            <a href="{{route('maintenance.category.create')}}">
                <button class="btn btn-primary col-md-12 btn-lg mb-2">Add Category</button>
            </a>
            <br>
            @php $i = 1; @endphp
            <table class="table table-striped table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col" class="col-md-2 text-center">#</th>
                        <th scope="col" class="col-md-2 text-center">Category</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($categories as $category)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$category->category}}</td>
                    </tr>
                @php $i += 1; @endphp
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
