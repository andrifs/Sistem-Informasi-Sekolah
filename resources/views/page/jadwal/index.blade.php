@extends('layouts.app')

@section('title', 'Halaman Jadwal')

@section('section-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Jadwal</h1>
        <p class="mb-4">Berikut merupakan data Jadwal</p>
        <a href="{{ route('jadwals.create') }}" class="btn btn-primary mb-2">Tambah Jadwal</a>
        <!--<a href="/cetak_guru" class="btn btn-danger mb-2" target="a_blank">Cetak Daftar Guru</a>
         DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Jadwal</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 5%">No</th>
                                <th class="text-center" style="">Hari</th>
                                <th class="text-center" style="">Sesi</th>
                                <th class="text-center" style="">Kelas</th>
                                <th class="text-center" style="width: 10%">Guru</th>
                                <th class="text-center" style="width: 25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jadwal as $key => $data )
                                <tr>
                                    <td class="text-center">{{$jadwal->firstitem() + $key}}</td>
                                    <td>{{ $data->hari }}</td>
                                    <td>{{ $data->sesi }}</td>
                                    <td>{{ $data->kelas->nama }}</td>
                                    <td>{{ $data->guru->user->name }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('jadwals.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('jadwals.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('jadwals.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
                        {{ $jadwal->firstItem() }}
                        To
                        {{ $jadwal->lastItem() }}
                        of
                        {{ $jadwal->total() }}
                        {{-- TOTAL tidak bisa digunakan ketika pake simplePaginate--}}
                        entries
                    </div>
                    <div class="col float-right">
                        <div class="pagination-block float-right">
                            {{-- hapus class pagination-block, jika menggunakan simplePaginate --}}
                            {{-- hapus isi didalam kurung links, jika menggunakan simplePaginate --}}

                            {{ $jadwal->links('layouts.paginate.paginationlinks') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
