<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\guru;
use App\siswa;
use App\kelas;
use App\jadwal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $guru = guru::all();
        $siswa = siswa::all();
        $kelas = kelas::all();
        $jadwal = jadwal::latest()->paginate(5);
        return view('home', compact('guru', 'siswa', 'kelas', 'jadwal'));
    }
}
