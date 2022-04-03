<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Guru;
use App\User;

class ProfileGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profileGuru = Guru::where('user_id', Auth::id())->first();
        return view('page.profile.guru', compact('profileGuru'));
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
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|min:11|max:13',
        ],
        [
           'name.required' => 'Nama Lengkap tidak boleh kosong',
           'alamat.required' => 'Alamat tidak boleh kosong',
           'no_hp.required' => 'Nomor HP tidak boleh kosong',
           'no_hp.min' => 'Minimal 11 karakter',
           'no_hp.max' => 'Maximal 13 karakter',
        ]);

        $guru = Guru::where('id', $id)->update([
            "alamat" => $request["alamat"],
            "no_hp" => $request["no_hp"],
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
