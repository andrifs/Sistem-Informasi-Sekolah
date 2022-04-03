@extends('layouts.app')

@section('title', 'Halaman Mata Pelajaran')

@section('section-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Mata Pelajaran</h1>
        <p class="mb-4">Berikut merupakan data mata pelajaran</p>
        <a href="{{ route('mapels.create') }}" class="btn btn-primary mb-2">Tambah Mapel</a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Mata Pelajaran</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 5%">No</th>
                                <th class="text-center" style="">Nama</th>
                                <th class="text-center" style="width: 25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mapel as $key => $data )
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('mapels.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Yakin Hapus Data?')">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('mapels.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('mapels.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <input type="submit" class="btn btn-danger my-1 btn-sm" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-danger">Data Kosong !</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
