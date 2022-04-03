<?php

namespace App\Http\Controllers;
use PDF;
use App\siswa;
use App\User;
use App\kelas;
use App\Guru;
use App\Mapel;
use Illuminate\Http\Request;

class CetakPdfController extends Controller
{
    //
    public function cetakSiswa(){
        $siswa = siswa::all();
        $kelas = kelas::all();
        $user = User::all();
        $pdf = PDF::loadView('pdf.cetakSiswa', compact('siswa','user','kelas'));
        return $pdf->stream();
    }
    public function cetakGuru(){
        $guru = Guru::all();
        $mapel = Mapel::all();
        $user = User::all();
        $pdf = PDF::loadView('pdf.cetakGuru', compact('guru','user','mapel'));
        return $pdf->stream();
    }
}
