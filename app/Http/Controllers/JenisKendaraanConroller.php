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
        return view('pages.kendaraan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.jeniskendaraan.create');

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
            'prefix' => 'required',
            'name' => 'required',
            'tarif' => 'required'
        ]);
        JenisKendaraan :: create([
            'prefix' => request('prefix'),
            'name' => request('name'),
            'tarif' => request('tarif')
        ]);

        return redirect('admin/jeniskendaraan')->with('flash_message', 'jenis kendaraan ditambah!');
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
        $jeniskendaraan = JenisKendaraan::find($id);
        return view('admin.jeniskendaraan.edit', compact('jeniskendaraan'));
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
        //
        $jeniskendaraan = JenisKendaraan::find($id);

        $jeniskendaraan->update([
            'prefix'=>request('prefix'),
            'name'=>request('name'),
            'tarif'=>request('tarif')
        ]);

        return redirect('admin/jeniskendaraan')->with('flash_message', 'jenis kendaraan diperbarui!');

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
        $jeniskendaraan = JenisKendaraan::find($id);
        $jeniskendaraan->delete();

        return redirect('admin/jeniskendaraan')->with('flash_message', 'jenis kendaraan terhapus!');
    }
}
