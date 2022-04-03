<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <style>
      .card-header h2{
        text-align:center;
      }
      table th,table td{
        border:2px solid black;
      }
      table tbody .noData{
        text-align:center;
        font-size:30px;
        color:red;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
       <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h2 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 5%">No</th>
                                <th class="text-center">NIS</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Alamat Rumah</th>
                                <th class="text-center">Nomor HP</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Kelas</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswa as $key => $value )
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>{{ $value->nis }}</td>
                                    <td>{{ $value->nama }}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>{{ $value->nomor_hp }}</td>
                                    <td>{{ $value->user->name }}</td>
                                    <td>{{ $value->kelas->nama }}</td>
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="noData text-center text-danger">Data Kosong !</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  </body>
</html>