@extends('layout')
@section('title', 'Login')
@section('content')
<div class="container">
    <div class="mt-5">
        @if($errors->any())
            <div class="col-12">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
           </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    <form action="{{ route('login.post') }}" method="POST" class="container-fluid" style="width: 500px">
        @csrf
        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <center><button type="submit" class="btn btn-danger px-5 w-100">Login</button><center>
    </form>
</div>
@endsection