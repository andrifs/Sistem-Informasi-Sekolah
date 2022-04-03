@extends('layouts.app')

@section('title', 'Tambah User')

@section('section-content')

<div class="row">
    <div class="col-md-12 d-flex justify-content-between">
        <div class="col-md-4">
            <h3>Tambah data Users</h3>
            <p>Untuk menambahkan data user baru silahkan isi data berikut</p>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
                                @error('name')
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
