@extends('layouts.app')

@section('title', 'Detail Data User')

@section('section-content')
    <h1 class="h3 mb-2 text-gray-800">Detail User</h1>
    <div class="card">
       <div class="card-body">
            <p>Nama : {{ $users->name }}</p>
            <p>Email : {{ $users->email }}</p>
            <p>Role : {{ $users->role->name }}</p>

            <a class="btn btn-primary" href="{{ route('users.index') }}">Kembali</a>
       </div>
    </div>
@endsection
