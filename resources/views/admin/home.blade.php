@extends('layout')
@section('title', 'Admin Home Page')
@section('content')
    <div class="container">
        @auth
        <h1>Selamat datang {{ auth()->user()->name }}!</h1>
        @endauth
        <h2>List akun terdaftar</h2>
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Email</th>
                <th scope="col" width="10%">Roles</th>
                <th scope="col" width="1%" colspan="3"></th>    
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td><a href="{{ route('admin.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-sm">Edit</a></td>
                        <td><a href="{{ route('admin.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr> 
                @endforeach
            </tbody>
        </table>

    </div>
@endsection