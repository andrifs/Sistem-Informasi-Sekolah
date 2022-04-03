@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('section-content')

<div class="row">
    <div class="col-md-12 d-flex justify-content-between">
        <div class="col-md-4">
            <h3>Tambah data Jadwal</h3>
            <p>Untuk menambahkan data Jadwal baru silahkan isi data berikut</p>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Jadwal</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('jadwals.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <select class="form-control form-control-sm @error('hari') is-invalid @enderror" name="hari">
                                    <option value="0" selected disabled>Pilih Data Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                                @error('hari')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sesi">Sesi</label>
                                <select class="form-control form-control-sm @error('sesi') is-invalid @enderror" name="sesi">
                                    <option value="0" selected disabled>Pilih Data Sesi</option>
                                    <option value="Pagi">Pagi</option>
                                    <option value="Siang">Siang</option>
                                </select>
                                @error('sesi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kelas_id">Kelas</label>
                                <select class="form-control form-control-sm @error('kelas_id') is-invalid @enderror" name="kelas_id">
                                    <option value="0" selected disabled>Pilih Data</option>
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
                                <label for="guru_id">Guru</label>
                                <select class="form-control form-control-sm @error('guru_id') is-invalid @enderror" name="guru_id">
                                    <option value="0" selected disabled>Pilih Data</option>
                                    @foreach ( $guru as $data )
                                        @if (old('guru_id') == $data->id)
                                            <option value="{{ $data->id }}">{{ $data->user->name }}</option>
                                        @else
                                            <option value="{{ $data->id }}">{{ $data->user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('guru_id')
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
