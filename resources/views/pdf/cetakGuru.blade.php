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
                <h2 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 5%">No</th>
                                <th class="text-center">NIP</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Alamat Rumah</th>
                                <th class="text-center">Nomor HP</th>
                                <th class="text-center">Mapel</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($guru as $key => $value )
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>{{ $value->nip }}</td>
                                    <td>{{ $value->user->name }}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>{{ $value->no_hp }}</td>
                                    <td>{{ $value->mapel->nama }}</td>
                                    
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