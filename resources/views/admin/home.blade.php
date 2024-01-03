@extends('layoutAdmin')
@section('title', 'Admin Home Page')

@section('content')
    <div class="container">
        @auth
        <center><h1>Welcome {{ auth()->user()->name }}!</h1><center>
        @endauth
        <h2>List of Register Account</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('admin.edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                            <form method="POST" action="{{ route('admin.delete', ['id' => $user->id]) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
