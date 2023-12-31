@extends('layoutAdmin')
@section('title', 'Add Menu')
@section('content')
<div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h1>Add Menu Item</h1>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="user_id">User:</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            @foreach($Users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tenant_id">Tenant:</label>
                        <select name="tenant_id" id="tenant_id" class="form-control" required>
                            @foreach($tenants as $tenant)
                                <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="menu_id">Menu:</label>
                        <select name="menu_id" id="menu_id" class="form-control" required>
                            @foreach($Menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Tanggal order">Order Date:</label>
                        <input type="date" id="date" name="date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Price:</label>
                        <select name="jumlah_amount" id="jumlah_amount" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="Catatan">Notes:</label>
                        <textarea id="notes" name="notes" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection