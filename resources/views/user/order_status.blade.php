@extends('layoutUser')
@section('title', 'Order Status')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Your Orders</h2>
        @if($orders->isEmpty())
            <div class="alert alert-info">No orders found.</div>
        @else
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">Pending Orders</h3>
                    <div class="list-group">
                        @forelse($orders->where('status', 'pending') as $order)
                            <div class="list-group-item">
                                <h5 class="mb-1">Order: {{ $order->food_name }}</h5>
                                <p class="mb-1">Price: Rp.{{ number_format($order->price, 2) }}</p>
                                <p class="mb-1">Status: {{ $order->status }}</p>
                            </div>
                        @empty
                            <p class="text-center">No pending orders.</p>
                        @endforelse
                    </div>

                    @if($orders->where('status', 'pending')->count() > 0)
                        <div class="text-center mt-4">
                            <a href="{{ route('user.payment') }}" class="btn btn-success">Pay</a>
                        </div>
                    @endif
                </div>

                <div class="col-md-6">
                    <h3 class="text-center">Paid Orders</h3>
                    <div class="list-group">
                        @forelse($orders->where('status', 'paid') as $order)
                            <div class="list-group-item">
                                <h5 class="mb-1">Order: {{ $order->food_name }}</h5>
                                <p class="mb-1">Price: Rp.{{ number_format($order->price, 2) }}</p>
                                <p class="mb-1">Status: {{ $order->status }}</p>
                            </div>
                        @empty
                            <p class="text-center">No paid orders.</p>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-12">
                    <h3 class="text-center">Processed Orders</h3>
                    <div class="list-group">
                        @forelse($orders->whereIn('status', ['In process', 'On the way']) as $order)
                            <div class="list-group-item">
                                <h5 class="mb-1">Order: {{ $order->food_name }}</h5>
                                <p class="mb-1">Price: Rp.{{ number_format($order->price, 2) }}</p>
                                <p class="mb-1">Status: {{ $order->status }}</p>
                            </div>
                        @empty
                            <p class="text-center">No current orders.</p>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-12">
                    <h3 class="text-center">Arrived Orders</h3>
                    <div class="list-group">
                        @forelse($orders->where('status', 'Food Arrived') as $order)
                            <div class="list-group-item">
                                <h5 class="mb-1">Order: {{ $order->food_name }}</h5>
                                <p class="mb-1">Price: Rp.{{ number_format($order->price, 2) }}</p>
                                <p class="mb-1">Status: {{ $order->status }}</p>
                                <form action="{{ route('user.order.feedbackForm', $order->id) }}" method="GET">
                                    <button type="submit" class="btn btn-success mt-2">Received</button>
                                </form>
                            </div>
                        @empty
                            <p class="text-center">No orders with 'Food Arrived' status.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
