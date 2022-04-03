@extends('layouts.app')

@section('title', 'Detail Data Guru')

@section('section-content')
    <h1 class="h3 mb-2 text-gray-800">Detail Guru</h1>
    <div class="card">
       <div class="card-body">
            <p>Hari : {{ $jadwal->hari }}</p>
            <p>Sesi : {{ $jadwal->sesi}}</p>
            <p>Kelas : {{ $jadwal->kelas->nama }}</p>
            <p>Guru : {{ $jadwal->guru->user->name }}</p>
            <p>Mata Pelajaran : {{ $jadwal->guru->mapel->nama }}</p>

            <a class="btn btn-primary" href="{{ route('jadwals.index') }}">Kembali</a>
       </div>
    </div>
@endsection
