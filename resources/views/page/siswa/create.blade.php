@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('section-content')

<div class="row">
    <div class="col-md-12 d-flex justify-content-between">
        <div class="col-md-4">
            <h3>Tambah data Siswa</h3>
            <p>Untuk menambahkan data siswa baru silahkan isi data berikut</p>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Siswa</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('siswas.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                           <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis">
                                @error('nis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Rumah</label>
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nomor_hp">Nomer HP/WA</label>
                                <input type="number" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror">
                                @error('nomor_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kelas_id">Kelas</label>
                                <select class="form-control form-control-sm @error('kelas_id') is-invalid @enderror" name="kelas_id">
                                    <option value="0" selected disabled>Pilih Kelas</option>
                                    @foreach ( $kelas as $data )
                                        @if (old('kelas_id') == $data->id)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @else
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select class="form-control form-control-sm @error('role_id') is-invalid @enderror" name="role_id">
                                    <option value="0" selected disabled>Pilih Data</option>
                                    @foreach ( $roles as $data )
                                        @if (old('role_id') == $data->id)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @else
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="********" autocomplete="new-password">
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
