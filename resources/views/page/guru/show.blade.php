@extends('layouts.app')

@section('title', 'Detail Data Guru')

@section('section-content')
    <h1 class="h3 mb-2 text-gray-800">Detail Guru</h1>
    <div class="card">
       <div class="card-body">
            <p>NIP : {{ $guru->nip }}</p>
            <p>Nama : {{ $guru->user->name }}</p>
            <p>Alamat : {{ $guru->alamat }}</p>
            <p>Nomor HP : {{ $guru->no_hp }}</p>
            <p>Mata Pelajaran : {{ $guru->mapel->nama }}</p>

            <a class="btn btn-primary" href="{{ route('gurus.index') }}">Kembali</a>
       </div>
    </div>
@endsection
