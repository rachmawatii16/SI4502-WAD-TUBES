@extends('layoutAdmin')
@section('title', 'Manage Payments')
@section('content')
    <div class="container mt-4">
        <h2>Payments List</h2>
        <div class="list-group">
            @foreach($payments as $payment)
                <div class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Payment #{{ $payment->id }}</h5>
                        <small>Order ID: {{ $payment->order_id }}</small>
                    </div>
                    <p class="mb-1">Amount: ${{ number_format($payment->amount, 2) }}</p>
                    <p class="mb-1">Status: {{ $payment->status }}</p>
                    <div class="mt-2">
                        <a href="{{ route('admin.payments.edit', $payment->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.payments.delete', $payment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
