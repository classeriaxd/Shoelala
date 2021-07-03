@extends('layouts.layout')

@section('content')

<div class="container" style="margin-top: 120px;" id="main-container">
   <div class="col-md-12">
      <h2 class="display-2 text-center mb-1">Order</h2>
      <a href="/c/cartlist">
         <button class="btn btn-secondary col-md-12 btn-lg mb-2">Go back</button>
     </a>
   <table class="table">
   <thead>
   <th scope="row" colspan="12" class="text-center">Order Details</th>
   </thead>
  <tbody>
      <tr>
      <td scope="col">Shoe Name</td>
      <td scope="col">Unit Price</td>
      <td scope="col">Quanitities Ordered</td>
      <td scope="col">Total Price</td>
      </tr>
      
      <tr></tr>
      @foreach ($orderTable as $item)
      <tr>
      <td>{{$item->name}}</td>
      <td>{{$item->price}}</td>
      <td>{{$item->cart_quantity}}</td>
      <td>{{number_format($item->price*$item->cart_quantity,2)}}</td>
      </tr>
      @endforeach
  </tbody>
  <tbody>
     <tr>
     <td></td>
     <td></td>
     <td scope="col">Checkout: ({{$numOfOrders}}) items</td>
     <td>{{$checkoutPrice}}</td>
     </tr>
  </tbody>
</table>
      <a href="/orderSuccess" class="btn btn-success col-md-12 btn-lg">Proceed</a>
   </div>
</div>
@endsection