@extends('layoutAdmin')
@section('title', 'Edit Tenant')
@section('content')
    <div class="container mt-4">
        <h2>Edit Tenant</h2>
        <form method="POST" action="{{ route('admin.tenants.update', $tenant->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tenant Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $tenant->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $tenant->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" required>{{ $tenant->address }}</textarea>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon:</label>
                <textarea class="form-control" id="phone" name="phone" required>{{ $tenant->phone }}</textarea>
            </div>
            <button type="submit" class="btn btn-secondary mt-2">Send</button>
        </form>
    </div>
@endsection
