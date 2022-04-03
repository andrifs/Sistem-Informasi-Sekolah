<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Guru;
use App\User;
use App\Mapel;
use App\Kelas;
use App\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $mapel = Mapel::all();
        $kelas = kelas::all();
        $guru = Guru::all();
        $jadwal = Jadwal::latest()->paginate(5);
        // dd($guru->all());
        return view('page.jadwal.index', compact('jadwal','user','mapel','guru','kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = kelas::all();
        $guru = Guru::all();
        $jadwal = Jadwal::all();
        return view('page.jadwal.create', compact('guru','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'sesi' => 'required',
            'kelas_id' => 'required',
            'guru_id' => 'required',
        ],
        [
           'hari.required' => 'Hari tidak boleh kosong',
           'sesi.required' => 'Sesi tidak boleh kosong',
           'kelas_id.required' => 'Kelas tidak boleh kosong',
           'guru_id.required' => 'Guru tidak boleh kosong',
        ]);
        Jadwal::create([
            "hari" => $request["hari"],
            "sesi" => $request["sesi"],
            "kelas_id" => $request["kelas_id"],
            "guru_id" => $request["guru_id"]
        ]);
        Alert::success('Berhasil', 'Berhasil Menambahkan Data Jadwal Baru');
        return redirect('jadwals');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = Jadwal::where('id', $id)->first();
        return view('page.jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = kelas::all();
        $guru = Guru::all();
        $jadwal = Jadwal::where('id', $id)->first();
        return view('page.jadwal.edit', compact( 'kelas','guru','jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required',
            'sesi' => 'required',
            'kelas_id' => 'required',
            'guru_id' => 'required',
        ],
        [
           'hari.required' => 'Hari tidak boleh kosong',
           'sesi.required' => 'Sesi tidak boleh kosong',
           'kelas_id.required' => 'Kelas tidak boleh kosong',
           'guru_id.required' => 'Guru tidak boleh kosong',
        ]);
        $jadwal = Jadwal::where('id', $id)->update([
            "hari" => $request["hari"],
            "sesi" => $request["sesi"],
            "kelas_id" => $request["kelas_id"],
            "guru_id" => $request["guru_id"]
        ]);
        Alert::success('Berhasil', 'Berhasil Update Data Jadwal');
        return redirect('jadwals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $query = jadwal::where('id', $id)->delete();
        return redirect('jadwals');
    }
}
