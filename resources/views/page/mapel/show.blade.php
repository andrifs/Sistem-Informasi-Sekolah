@extends('layouts.app')

@section('title', 'Detail Data Mapel')

@section('section-content')
    <h1 class="h3 mb-2 text-gray-800">Detail Mata Pelajaran</h1>
    <div class="card">
       <div class="card-body">
            <p>ID Mapel : {{ $mapel->id }}</p>
            <p>Nama : {{ $mapel->nama }}</p>
            <a class="btn btn-primary" href="{{ route('mapels.index') }}">Kembali</a>
       </div>
    </div>
@endsection
