@extends('layouts.app')

@section('title', 'Detail Data Siswa')

@section('section-content')
    <h1 class="h3 mb-2 text-gray-800">Detail Siswa</h1>
    <div class="card">
       <div class="card-body">
            <p>NIS : {{ $siswa->nis }}</p>
            <p>Nama : {{ $siswa->user->name }}</p>
            <p>Alamat : {{ $siswa->alamat }}</p>
            <p>Nomor HP : {{ $siswa->nomor_hp }}</p>
            <p>Kelas : {{ $siswa->kelas->nama }}</p>

            <a class="btn btn-primary" href="{{ route('siswas.index') }}">Kembali</a>
       </div>
    </div>
@endsection
