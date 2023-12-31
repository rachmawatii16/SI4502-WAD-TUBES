@extends('layoutAdmin')
@section('title', 'Edit Tenant')
@section('content')
    <div class="container mt-4">
        <h2>Edit Tenant</h2>
        <form method="POST" action="{{ route('admin.tenants.update', $tenant->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="menu_id">Menu:</label>
                <input type="text" class="form-control" id="menu_id" name="menu" value="{{ $tenant->menu }}" required>
            </div>
            <div class="form-group">
                <label for="jumlah_amount">Price:</label>
                <input type="text" class="form-control" id="jumlah_amount" name="jumlah_amount" value="{{ $tenant->jumlah_amount }}" required>
            </div>
            <div class="form-group">
                <label for="catatan">Notes:</label>
                <textarea class="form-control" id="catatan" name="notes" required>{{ $tenant->catatan }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update Tenant</button>
        </form>
    </div>
@endsection
