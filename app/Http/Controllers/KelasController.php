<?php

namespace App\Http\Controllers;

use App\kelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $kelas = kelas::latest()->paginate(5);
        return view('page.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          $kelas = kelas::all();
        return view('page.kelas.create', compact('kelas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $request->validate(['nama' => 'required',],['nama.required' => 'Nama tidak boleh kosong',]);
        $query = kelas::create(["nama" => $request["nama"],]);

        Alert::success('Berhasil', 'Berhasil Menambahkan Data Kelas Baru');
        return redirect('kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $kelas = kelas::where('id', $id)->first();
        return view('page.kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kelas = kelas::where('id', $id)->first();
        return view('page.kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate(['nama' => 'required',],['nama.required' => 'Nama tidak boleh kosong',]);
        $query = kelas::where('id', $id)->update(["nama" => $request["nama"]]);
        
        Alert::success('Berhasil', 'Berhasil Update Data Kelas');
         return redirect('kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $query = kelas::where('id', $id)->delete();
        return redirect('kelas');
    }
}
