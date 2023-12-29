@extends('layoutAdmin')
@section('title', 'Admin Orders')
@section('content')
    <h2>All Orders</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @foreach($orders as $order)
        <div>
            <form method="POST" action="{{ route('admin.order.update', ['id' => $order->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">Update Status:</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="In process" {{ $order->status == 'In process' ? 'selected' : '' }}>In process</option>
                        <option value="On the way" {{ $order->status == 'On the way' ? 'selected' : '' }}>On the way</option>
                        <option value="Food Arrived" {{ $order->status == 'Food Arrived' ? 'selected' : '' }}>Food Arrived</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Status</button>
            </form>
        </div>
        <hr>
    @endforeach
@endsection
