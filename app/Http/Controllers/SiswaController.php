<?php

namespace App\Http\Controllers;

use App\siswa;
use App\User;
use App\kelas;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        $kelas = kelas::all();
        $siswa = siswa::latest()->paginate(5);
        return view('page.siswa.index', compact('siswa','user','kelas'));
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
         $user = User::all();
         $siswa = siswa::all();
         $roles = Role::all();
        return view('page.siswa.create', compact('siswa','kelas','user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nis' => 'required|unique:siswas',
            'alamat' => 'required',
            'nomor_hp' => 'required|min:11|max:13',
            'kelas_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|string|confirmed',
            'role_id' => 'required',
        ],
        [
           'nis.required' => 'NIS tidak boleh kosong',
           'nis.unique' => 'NIS sudah digunakan',
           'alamat.required' => 'Alamat tidak boleh kosong',
           'nomor_hp.required' => 'Nomor HP tidak boleh kosong',
           'nomor_hp.min' => 'Minimal 11 karakter',
           'nomor_hp.max' => 'Maximal 13 karakter',
           'kelas_id.required' => 'Kelas tidak boleh kosong',
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
        siswa::create([
            "nis" => $request["nis"],
            "alamat" => $request["alamat"],
            "nomor_hp" => $request["nomor_hp"],
            "user_id" => $user->id,
            "kelas_id" => $request["kelas_id"]
        ]);
        
        Alert::success('Berhasil', 'Berhasil Menambahkan Data Siswa Baru');
        return redirect('siswas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $siswa = siswa::where('id', $id)->first();
        return view('page.siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::all();
        $kelas = kelas::all();
        $siswa = siswa::where('id', $id)->first();
        return view('page.siswa.edit', compact( 'user','kelas','siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
          $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required|min:11|max:13',
            'kelas_id' => 'required',
        ],
        [
           'nis.required' => 'NIS tidak boleh kosong',
           'name.required' => 'Nama Lengkap tidak boleh kosong',

           'alamat.required' => 'Alamat tidak boleh kosong',
           'nomor_hp.required' => 'Nomor HP tidak boleh kosong',
           'nomor_hp.min' => 'Minimal 11 karakter',
           'nomor_hp.max' => 'Maximal 13 karakter',
           'kelas_id.required' => 'Kelas tidak boleh kosong',
        ]);
        $siswa = siswa::where('id', $id)->update([
            "nis" => $request["nis"],
            "alamat" => $request["alamat"],
            "nomor_hp" => $request["nomor_hp"],
            "kelas_id" => $request["kelas_id"],
        ]);

        // $findUser = siswa::where("user_id", 7)->first();

        $user = User::where('id', $request['user_id'])->update([
            "name" => $request["name"]
        ]);


        // dd();
        
        Alert::success('Berhasil', 'Berhasil Update Data Siswa');
        return redirect('siswas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $query = siswa::where('id', $id)->delete();
        return redirect('siswas');
    }
}