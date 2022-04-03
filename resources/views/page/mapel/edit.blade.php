@extends('layouts.app')

@section('title', 'Edit Data Mapel')

@section('section-content')
<div class="row">
    <div class="col-md-12 d-flex justify-content-between">
        <div class="col-md-4">
            <h3>Edit data Mata Pelajaran</h3>
            <p>Untuk edit data Mapel silahkan isi data berikut</p>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Mapel</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('mapels.update', $mapel->id) }}" method="post">
                        @csrf
                        @method('PUT')
                      
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama', $mapel->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
