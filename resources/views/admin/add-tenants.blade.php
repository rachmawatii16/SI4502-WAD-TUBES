@extends('layoutAdmin')
@section('title', 'Add Tenant')
@section('content')
    <div class="container mt-4">
        <h2>Add a New Tenant</h2>
        <form method="POST" action="{{ route('admin.tenants.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Tenant Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon:</label>
                <textarea class="form-control" id="phone" name="phone" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add Tenant</button>
        </form>
    </div>
@endsection
