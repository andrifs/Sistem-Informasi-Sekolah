<?php

namespace App\Http\Controllers;

use App\Guru;
use App\User;
use App\Mapel;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class GuruController extends Controller
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
        $guru = Guru::latest()->paginate(5);
        // dd($guru->all());
        return view('page.guru.index', compact('guru','user','mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = mapel::all();
        $user = User::all();
        $guru = guru::all();
        $roles = Role::all();
        return view('page.guru.create', compact('guru','mapel','user', 'roles'));
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
            'nip' => 'required|unique:gurus',
            'alamat' => 'required',
            'no_hp' => 'required|min:11|max:13',
            'mapel_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|string|confirmed',
            'role_id' => 'required',
        ],
        [
           'nip.required' => 'NIP tidak boleh kosong',
           'nip.unique' => 'NIP sudah digunakan',
           'alamat.required' => 'Alamat tidak boleh kosong',
           'no_hp.required' => 'Nomor HP tidak boleh kosong',
           'no_hp.min' => 'Minimal 11 karakter',
           'no_hp.max' => 'Maximal 13 karakter',
           'mapel_id.required' => 'Mapel tidak boleh kosong',
           'name.required' => 'Nama tidak boleh kosong',
           'email.required' => 'Email tidak boleh kosong',
           'email.unique' => 'Email sudah digunakan',
           'password.required' => 'Password tidak boleh kosong',
           'password.min' => 'Minimal 8 karakter',
           'password.confirmed' => 'Password tidak sesuai',
           'role_id.required' => 'Role tidak boleh kosong',
        ]);

        $user = User::create([
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => Hash::make($request['password']),
            "role_id" => $request["role_id"]
        ]);
        Guru::create([
            "nip" => $request["nip"],
            "alamat" => $request["alamat"],
            "no_hp" => $request["no_hp"],
            "user_id" => $user->id,
            "mapel_id" => $request["mapel_id"]
        ]);
        Alert::success('Berhasil', 'Berhasil Menambahkan Data Guru Baru');
        return redirect('gurus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $guru = guru::where('id', $id)->first();
        return view('page.guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::all();
        $mapel = mapel::all();
        $guru = guru::where('id', $id)->first();
        return view('page.guru.edit', compact( 'user','mapel','guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|min:11|max:13',
            'mapel_id' => 'required',
        ],
        [
           'name.required' => 'Nama Lengkap tidak boleh kosong',

           'alamat.required' => 'Alamat tidak boleh kosong',
           'no_hp.required' => 'Nomor HP tidak boleh kosong',
           'no_hp.min' => 'Minimal 11 karakter',
           'no_hp.max' => 'Maximal 13 karakter',
           'mapel_id.required' => 'Mapel tidak boleh kosong',
        ]);
        $guru = guru::where('id', $id)->update([
            "alamat" => $request["alamat"],
            "no_hp" => $request["no_hp"],
            "mapel_id" => $request["mapel_id"],
        ]);

        // $findUser = siswa::where("user_id", 7)->first();

        $user = User::where('id', $request['user_id'])->update([
            "name" => $request["name"]
        ]);

        Alert::success('Berhasil', 'Berhasil Update Data Guru Baru');
        return redirect('gurus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $query = guru::where('id', $id)->delete();
        return redirect('gurus');
    }
}