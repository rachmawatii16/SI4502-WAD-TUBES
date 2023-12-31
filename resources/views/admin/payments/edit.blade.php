@extends('layoutAdmin')
@section('title', 'Edit Payment')
@section('content')
    <div class="container mt-4">
        <h2>Edit Payment #{{ $payment->id }}</h2>
        <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" value="{{ $payment->amount }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="failed" {{ $payment->status == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-3">Update Payment</button>
        </form>
    </div>
@endsection
