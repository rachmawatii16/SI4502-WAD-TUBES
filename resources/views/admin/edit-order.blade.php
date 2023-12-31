@extends('layoutAdmin')
@section('title', 'Edit Order')
@section('content')
    <div class="container mt-4">
        <h2>Edit Order #{{ $order->id }}</h2>
        <form method="POST" action="{{ route('admin.orders.update', $order->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_id">User:</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="food_name">Food Name:</label>
                <input type="text" name="food_name" id="food_name" class="form-control" value="{{ $order->food_name }}">
            </div>
@endsection
