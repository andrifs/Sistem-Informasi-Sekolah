@extends('layouts.app')

@section('title', 'Detail Data Kelas')

@section('section-content')
    <h1 class="h3 mb-2 text-gray-800">Detail Kelas</h1>
    <div class="card">
       <div class="card-body">
            <p>ID Kelas : {{ $kelas->id }}</p>
            <p>Nama : {{ $kelas->nama }}</p>
            <a class="btn btn-primary" href="{{ route('kelas.index') }}">Kembali</a>
       </div>
    </div>
@endsection
