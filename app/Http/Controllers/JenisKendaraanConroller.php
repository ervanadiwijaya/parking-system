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
            'prefix'        => 'required|min:2|max:2|unique:jenis_kendaraan',
            'name'          => 'required',
            'tarif_awal'    => 'required',
            'tarif_perjam'  => 'required'
        ]);
        JenisKendaraan::create([
            'prefix'        => request('prefix'),
            'name'          => request('name'),
            'tarif_awal'    => request('tarif_awal'),
            'tarif_perjam'  => request('tarif_perjam'),
            'tarif_max'     => request('tarif_max')
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
        $kendaraan = JenisKendaraan::find(base64_decode($id));
        return view('pages.kendaraan.show')->with(compact('kendaraan'));
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
            'prefix'        => 'required|min:2|max:2|unique:jenis_kendaraan',
            'name'          => 'required',
            'tarif_awal'    => 'required',
            'tarif_perjam'  => 'required'
        ]);

        $jeniskendaraan = JenisKendaraan::find($id);

        $jeniskendaraan->update([
            'prefix'        =>request('prefix'),
            'name'          =>request('name'),
            'tarif_awal'    => request('tarif_awal'),
            'tarif_perjam'  => request('tarif_perjam'),
            'tarif_max'     => request('tarif_max')
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
        $kendaraan = JenisKendaraan::find($id);
        $kendaraan->delete();
        return redirect('/kendaraan')->with('message', 'Jenis Kendaran berhasil dihapus');
    }
}
