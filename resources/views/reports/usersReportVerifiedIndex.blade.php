@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 100px;" id="main-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="display-4 text-center mt-4">Verified User Reports</h3>
        {{-- Quarter Buttons --}}
            <div class="row text-center">
                <div class="col ">
                    <form action="{{route('verifiedreport.show')}}" method="POST">
                        @csrf
                        <button class="btn btn-primary w-100 h-100" name="first" value="first" type="submit">1st Quarter of<br>{{date('Y')}}</button>
                    </form>
                </div>
                <div class="col">
                    <form action="{{route('verifiedreport.show')}}" method="POST">
                        @csrf
                        <button class="btn btn-primary w-100 h-100" name="second" value="second" type="submit">2nd Quarter of<br>{{date('Y')}}</button>
                    </form>
                </div>
                <div class="col">
                    <form action="{{route('verifiedreport.show')}}" method="POST">
                        @csrf
                        <button class="btn btn-primary w-100 h-100" name="third" value="third" type="submit">3rd Quarter of<br>{{date('Y')}}</button>
                    </form>
                </div>
                <div class="col">
                    <form action="{{route('verifiedreport.show')}}" method="POST">
                        @csrf
                        <button class="btn btn-primary w-100 h-100" name="fourth" value="fourth" type="submit">4th Quarter of<br>{{date('Y')}}</button>
                    </form>
                </div>                          
            </div>
        {{-- Quarter Labels --}}
            <div class="row text-center text-muted mb-1">
                <div class="col">
                    <label for="first" class="col-form-label">JAN — MAR</label>
                </div>
                <div class="col">
                    <label for="second" class="col-form-label">APR — JUN</label>
                </div>
                <div class="col">
                    <label for="first" class="col-form-label">JUL — SEP</label>
                </div>
                <div class="col">
                    <label for="first" class="col-form-label">OCT — DEC</label>
                </div>
            </div>
            <hr>
            <form action="{{route('verifiedreport.show')}}" method="POST">
            {{-- Custom Date Range --}}
                <h5 class="text-center">Custom</h5>
                <div class="form-group row mt-1">
                    <div class="col">
                        <div class="text-center">
                            <label for="start_date" class="col-form-label text-muted text-center">Start Date</label>
                        </div>
                        <input id="start_date" name="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}">
                        @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <label for="end_date" class="col-form-label text-muted text-center">End Date</label>
                        </div>
                        <input id="end_date" name="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
                        @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            {{-- Custom Submit Button --}}
                <div class="form-group row">
                    <div class="col">
                        <button class="btn btn-primary w-100 h-100" name="custom" value="custom" type="submit">Generate Report</button>
                    </div>
                </div>
                @csrf                                
            </form>
        
        </div>
    </div>
</div>
@endsection
