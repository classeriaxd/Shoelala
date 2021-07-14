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
      <td scope="col">Shoe Name </td>
      <td scope="col">SKU</td>
      <td scope="col">Unit Price</td>
      <td scope="col">Quanitities Ordered</td>
      <td scope="col">Total Price</td>
      </tr>
      
      <tr></tr>
      @foreach ($orderTable as $item)
      <tr>
      <td>{{$item->name}} </td>
      <td>{{$item->sku}} </td>
      <td>{{$item->shoe_price}}</td>
      <td>{{$item->cart_quantity}}</td>
      <td>{{number_format($item->shoe_price*$item->cart_quantity,2)}}</td>
      </tr>
      @endforeach
  </tbody>
  <tbody>
     <tr>
     <td></td>
     <td></td>
     <td scope="col">Checkout: ({{$numOfOrders}}) items</td>
     <td>{{number_format($checkoutPrice,2)}}</td>
     </tr>
  </tbody>
</table>

<form action="/order/orderSuccess" method="POST">
                                @csrf
                                <input type="hidden" name="shoe_id" value="{{$userID->cart_user_id}}" >
                               
                            <button class="btn btn-success col-md-12 btn-lg">Proceed</button>
                            </form>
                       
   </div>
   
</div>

@endsection