@extends('layouts.app')

@section('title', 'Home')

@section('section-content')
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($siswa) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Guru</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($guru) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Kelas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($kelas) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jadwal</h6>
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
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwal as $key => $data )
                        <tr>
                            <td class="text-center">{{$jadwal->firstItem() + $key}}</td>
                            <td>{{ $data->hari }}</td>
                            <td>{{ $data->sesi }}</td>
                            <td>{{ $data->kelas->nama }}</td>
                            <td>{{ $data->guru->user->name }}</td>
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
@endsection
