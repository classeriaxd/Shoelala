@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <h3 class="display-4 text-center mt-4"> USERS REPORT</h3>
            <h3 class="display-5 text-center mt-1">{{$startDate.' - '.$endDate}}</h3>
            <hr>
        {{-- PENDING ORDERS --}}
            @php $i = 1; @endphp
            <table class="table-striped table-bordered text-center w-100 mb-1">
                <thead class="thead-dark">
                    <tr class="bg-primary">
                        <th scope="col" colspan="4" style="color: white;">TOP PURCHASERS</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-dark" style="color: white;">
                        <th scope="col">#</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">USER</th>
                        <th scope="col">AMOUNT PURCHASED</th>
                    </tr>
            @if($purchasers->count() > 0)
                @foreach($purchasers as $user)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td scope="row">{{$user->order_id}}</td>
                        <td scope="row">{{$user->user_fullName}}</td>
                        <td scope="row">{{$user->amount}}</td>
                    </tr>
                @php $i += 1; @endphp
                @endforeach
            @else
                    <tr>
                        <td scope="row" colspan="3">NO USERS FOUND</td>
                    </tr>
            @endif
                </tbody>
            </table>
            <hr>
                </tbody>
            </table>        
        </div>
    </div>
</div>
@endsection
