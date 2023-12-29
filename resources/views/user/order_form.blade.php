@extends('layoutUser')
@section('title', 'Place Order')
@section('content')
    <h2>Place Your Food Order</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('user.order') }}">
        @csrf
        <div class="form-group">
            <label for="food_name">Food Name:</label>
            <input type="text" id="food_name" name="food_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
@endsection
