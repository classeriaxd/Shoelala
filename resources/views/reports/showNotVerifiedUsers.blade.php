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
                        <th scope="col" colspan="3" style="color: white;">NON-VERIFIED USERS</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-dark" style="color: white;">
                        <th scope="col">#</th>
                        <th scope="col">USER</th>
                        <th scope="col">DATE OF CREATION</th>
                    </tr>
            @if($notVerifiedUsers->count() > 0)
                @foreach($notVerifiedUsers as $user)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td scope="row">{{$user->user_fullName}}</td>
                        <td scope="row">{{$user->created_date}}</td>
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
