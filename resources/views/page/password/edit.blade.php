@extends('layouts.app')

@section('title', 'Ubah Password')

@section('section-content')
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between">
            <div class="col-md-4">
                <h3>Ubah Password</h3>
                <p>Untuk ubah Password silahkan di bawah ini</p>
            </div>
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Password</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.password.edit') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="password">Current Password</label>
                                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password">
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">Password Confirm</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
