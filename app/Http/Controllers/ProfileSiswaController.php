<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\siswa;
use App\User;

class ProfileSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profileSiswa = siswa::where('user_id', Auth::id())->first();
        // dd($profileSiswa);
        return view('page.profile.siswa', compact('profileSiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required|min:11|max:13',
        ],
        [
           'name.required' => 'Nama Lengkap tidak boleh kosong',
           'alamat.required' => 'Alamat tidak boleh kosong',
           'nomor_hp.required' => 'Nomor HP tidak boleh kosong',
           'nomor_hp.min' => 'Minimal 11 karakter',
           'nomor_hp.max' => 'Maximal 13 karakter',
        ]);

        $siswa = siswa::where('id', $id)->update([
            "alamat" => $request["alamat"],
            "nomor_hp" => $request["nomor_hp"],
        ]);
        $user = User::where('id', $request['user_id'])->update([
            "name" => $request["name"]
        ]);

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}