<?php

namespace App\Http\Controllers;

use App\JenisKendaraan;
use Illuminate\Http\Request;

class JenisKendaraanConroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraan = JenisKendaraan::orderBy('created_at', 'desc')->get();
        return view('pages.kendaraan.index')->with(compact('kendaraan'));
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
        $request->validate([
            'prefix' => 'required|min:2|max:2|unique:jenis_kendaraan',
            'name' => 'required',
            'tarif' => 'required'
        ]);
        JenisKendaraan::create([
            'prefix' => request('prefix'),
            'name' => request('name'),
            'tarif' => request('tarif')
        ]);

        return back()->with('message', 'jenis kendaraan ditambah!');
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
        $jeniskendaraan = JenisKendaraan::find($id);

        $jeniskendaraan->update([
            'prefix'=>request('prefix'),
            'name'=>request('name'),
            'tarif'=>request('tarif')
        ]);

        return back()->with('message', 'jenis kendaraan diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jeniskendaraan = JenisKendaraan::find($id);
        $jeniskendaraan->delete();
        return back()->with('message', 'jenis kendaraan terhapus!');
    }
}
