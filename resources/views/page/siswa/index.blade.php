@extends('layouts.app')

@section('title', 'Halaman Siswa')

@section('section-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Siswa</h1>
        <p class="mb-4">Berikut merupakan data siswa</p>
        <a href="{{ route('siswas.create') }}" class="btn btn-primary mb-2">Tambah Siswa</a>
        <a href="/cetak_siswa" class="btn btn-danger mb-2" target="a_blank">Cetak Daftar Siswa</a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Siswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 5%">No</th>
                                <th class="text-center" style="10">NIS</th>
                                <th class="text-center" style="30">Nama</th>
                                <th class="text-center" style="20">Email</th>
                                <th class="text-center" style="width: 10%">Kelas</th>
                                <th class="text-center" style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswa as $key => $data )
                                <tr>
                                    <td class="text-center">{{$siswa->firstItem() + $key}}</td>
                                    <td>{{ $data->nis }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->user->email }}</td>
                                    <td>{{ $data->kelas->nama }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('siswas.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('siswas.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('siswas.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
                    <div class="pull-left">
                        Showing
                        {{ $siswa->firstItem() }}
                        To
                        {{ $siswa->lastItem() }}
                        of
                        {{ $siswa->total() }}
                        {{-- TOTAL tidak bisa digunakan ketika pake simplePaginate--}}
                        entries
                    </div>
                    <div class="col float-right">
                        <div class="pagination-block float-right">
                            {{-- hapus class pagination-block, jika menggunakan simplePaginate --}}
                            {{-- hapus isi didalam kurung links, jika menggunakan simplePaginate --}}

                            {{ $siswa->links('layouts.paginate.paginationlinks') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
