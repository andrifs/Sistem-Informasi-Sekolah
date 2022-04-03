<?php

namespace App\Http\Controllers;

use App\Mapel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = mapel::latest()->paginate(5);
        return view('page.mapel.index', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = mapel::all();
        return view('page.mapel.create', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nama' => 'required',],['nama.required' => 'Nama tidak boleh kosong',]);
        $query = mapel::create(["nama" => $request["nama"],]);

        Alert::success('Berhasil', 'Berhasil Menambahkan Data Mata Pelajaran Baru');
        return redirect('mapels');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mapel = mapel::where('id', $id)->first();
        return view('page.mapel.show', compact('mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = mapel::where('id', $id)->first();
        return view('page.mapel.edit', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['nama' => 'required',],['nama.required' => 'Nama tidak boleh kosong',]);
        $query = mapel::where('id', $id)->update(["nama" => $request["nama"]]);
        
        Alert::success('Berhasil', 'Berhasil Update Data Mata Pelajaran');
        return redirect('mapels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = mapel::where('id', $id)->delete();
        return redirect('mapels');
    }
}
