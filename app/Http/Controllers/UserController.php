<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('hasRole:admin')->only('store', 'update', 'destroy');
    // }

    public function index()
    {
        $karyawan = User::orderBy('created_at', 'desc')->get();
        return view('pages.karyawan.index')->with(compact('karyawan'));
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
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required | email | unique:users',
            'password'  => 'required',
            'role'      => 'required',
        ]);

        $roles = ['petugas', 'admin'];
        if (!in_array($request->input('role'), $roles)) {
            return back()->with('error', 'Gagal menambahkan, role tidak ditemukan');
        }

        User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
            'role'      => $request->input('role'),
        ]);

        return back()->with('message', $request->input('role').' berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrfail(base64_decode($id));
        return view('pages.karyawan.show')->with(compact('user'));
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
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required | email',
            'role'      => 'required',
        ]);

        $roles = ['petugas', 'admin'];
        if (!in_array($request->input('role'), $roles)) {
            return back()->with('error', 'Gagal menambahkan, role tidak ditemukan');
        }

        $user = User::findOrfail(base64_decode($id));

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->update();

        return back()->with('message', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(base64_decode($id));
        $user->delete();
        return redirect('karyawan')->with('message', 'Data berhasil dihapus');
    }
}
