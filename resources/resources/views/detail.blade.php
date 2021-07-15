@extends('layouts.layout')

@section('content')
<div class="container">
   <div class="row">
        <div class="col-sm-6">
        <img src="{{'/storage/'.$shoe->image_angle_id}}" alt="{{$shoe->name}}">
        </div>
        <div class="col-sm-6">
            <a href="/">Go Back</a>
            <h2>{{$shoe['name']}}</h2>
            <h4>Price: {{$shoe['price']}}</h4>
            <h5>Description: {{$shoe['description']}}</h5>
            <br><br>
            <form action="/c/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="shoe_id" value="{{$shoe['shoe_id']}}">
            <button class="btn btn-primary">Add to cart</button>
            </form>
            <br><br>
            <button class="btn btn-success">Buy Now</button>
        </div>
   </div>
</div>
@endsection
