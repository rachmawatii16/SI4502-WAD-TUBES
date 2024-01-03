@extends('layoutAdmin')
@section('title', 'View Feedback')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Feedback from Users</h2>
        <div class="list-group">
            @forelse($feedbacks as $feedback)
                <div class="list-group-item">
                    <p><strong>Order Number:</strong> {{ $feedback->order_number ?? 'N/A' }}</p>
                    <p><strong>Food Name:</strong> {{ $feedback->food_name ?? 'N/A' }}</p>
                    <p><strong>Feedback:</strong> {{ $feedback->content }}</p>
                    <p><strong>Submitted At:</strong> {{ $feedback->created_at->format('Y-m-d H:i') }}</p>
                    <form action="{{ route('admin.feedback.delete', ['id' => $feedback->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @empty
                <p class="text-center">No feedback available.</p>
            @endforelse
        </div>
    </div>
@endsection
