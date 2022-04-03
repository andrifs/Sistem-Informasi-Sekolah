@extends('layouts.app')

@section('title', 'Profile')

@section('section-content')
<div class="row">
    <div class="col-md-12 d-flex justify-content-between">
        <div class="col-md-4">
            <h3>Profile</h3>
            <p>Untuk edit data user silahkan isi data berikut</p>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('profileSiswa.update', $profileSiswa->id) }}" method="post" enctype="multipart/form">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            {{-- <div class="form-group">
                                <label for="foto">Updload Foto Profil</label>
                                <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror" id="foto">

                                @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" value="{{ old('nis', $profileSiswa->nis) }}" disabled>
                                @error('nis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $profileSiswa->user->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $profileSiswa->user->email) }}" disabled>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Rumah</label>
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ old('alamat', $profileSiswa->alamat) }}">
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nomor_hp">Nomor HP</label>
                                <input type="text" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" value="{{ old('nomor_hp', $profileSiswa->nomor_hp) }}">
                                @error('nomor_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" disabled hidden>
                                <label for="user_id">User ID</label>
                                <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id" value="{{ old('user_id', $profileSiswa->user_id) }}">
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
