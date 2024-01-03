@extends('layoutUser')
@section('title', 'Submit Feedback')
@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="mb-4 text-center">Feedback for Order #{{ $order->id }}</h2>
        <form action="{{ route('user.order.submitFeedback', $order->id) }}" method="POST">
            @csrf
            <p>Menu: {{ $order->food_name }}</p>
            <p>Price: Rp.{{ number_format($order->price, 2) }}</p>
            <div class="form-group">
                <label for="feedback">Feedback:</label>
                <textarea name="content" id="feedback" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit Feedback</button>
        </form>
    </div>
@endsection
