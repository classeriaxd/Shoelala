@extends('layouts.app')

@section('content')
<div class="container">
   <div class="col-sm-10">
   <table class="table">
   <thead>
   <th scope="row" colspan="12">Order Details</th>
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
<a  href="/orderSuccess" class="btn btn-success">Proceed  </a>
   </div>
</div>
@endsection