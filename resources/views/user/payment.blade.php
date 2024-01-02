@extends('layoutUser')
@section('title', 'Payment')

@section('content')
    <div class="container mt-4">
        <h2>Payment for Order #{{ $order->id }}</h2>
        <p><strong>Order Details:</strong> {{ $order->food_name }}</p>
        <p><strong>Amount Due:</strong> Rp.{{ number_format($order->price, 2) }}</p>

        <form action="{{ route('user.payment.proceed', $order->id) }}" method="POST">
            @csrf
            <input type="hidden" name="amount" value="{{ $order->price }}">

            <div class="form-group mb-3">
                <label for="payment_method">Payment Method:</label>
                <select name="payment_method" id="payment_method" class="form-control">
                    <option value="cash">Cash</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Proceed with Payment</button>
        </form>
    </div>
@endsection