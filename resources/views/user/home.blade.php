@extends('layoutUser')
@section('title', 'Home Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center><h1>Welcome to CAN-U, {{ Auth::user()->name }}!</h1><center>
            </div>
        </div>
    </div>
@endsection