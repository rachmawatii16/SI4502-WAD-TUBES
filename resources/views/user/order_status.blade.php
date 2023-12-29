@extends('layoutUser')
@section('title', 'Order Status')
@section('content')
    <h2>Your Order Status</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($orders->isEmpty())
        <p>You have no orders.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Food Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->food_name }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            @if($order->status == 'Food Arrived')
                                <a href="{{ route('user.order.confirmReceived', $order->id) }}" class="btn btn-success">Received</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
