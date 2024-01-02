@extends('layoutAdmin')
@section('title', 'List of Tenants')

@section('content')
    <div class="container mt-4">
        <h2>List of Tenants</h2>
        <a href="{{ route('admin.tenants.create') }}" class="btn btn-success mb-2">Add New Tenant</a>
        <div class="list-group">
            @forelse($tenants as $tenant)
                <div class="list-group-item">
                    <h5>{{ $tenant->name }}</h5>
                    <p>{{ $tenant->description }}</p>
                    <p>{{ $tenant->address }}</p>
                    <p>{{ $tenant->phone }}</p>
                    <a href="{{ route('admin.tenants.edit', $tenant->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.tenants.delete', $tenant->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @empty
                <p>No tenants found.</p>
            @endforelse
        </div>
    </div>
@endsection