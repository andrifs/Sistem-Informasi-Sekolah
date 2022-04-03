<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::latest()->paginate(5);
        return view('page.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('page.user.create', compact('roles'));
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|string|confirmed',
            'role_id' => 'required',
        ],
        [
           'name.required' => 'Nama tidak boleh kosong',
           'email.required' => 'Email tidak boleh kosong',
           'email.unique' => 'Email sudah digunakan',
           'password.required' => 'Password tidak boleh kosong',
           'password.min' => 'Minimal 8 karakter',
           'password.confirmed' => 'Password tidak sesuai',
           'role_id.required' => 'Role tidak boleh kosong',
        ]);
        $query = User::create([
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => Hash::make($request['password']),
            "role_id" => $request["role_id"]
        ]);
        
        Alert::success('Berhasil', 'Berhasil Menambahkan Data User Baru');
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::where('id', $id)->first();
        return view('page.user.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::where('id', $id)->first();
        return view('page.user.edit', compact('roles', 'user'));
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
            'email' => 'required',
            'role_id' => 'required',
        ],
        [
           'name.required' => 'Nama tidak boleh kosong',
           'email.required' => 'Email tidak boleh kosong',
           'role_id.required' => 'Role tidak boleh kosong',
        ]);

        $query = User::where('id', $id)->update([
            'name' => $request["name"],
            'email' => $request["email"],
            'role_id' => $request["role_id"],
        ]);

        Alert::success('Berhasil', 'Berhasil Update Data User');
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = User::where('id', $id)->delete();
        return redirect('/users');
    }
}