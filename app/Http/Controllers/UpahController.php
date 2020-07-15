<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upah;
use App\User;

class UpahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upah = Upah::get();
        $karyawan = User::with('upah')->get();
        // return $karyawan[0]->upah->id;
        // return $upah[0] -> tunjangan_makan;
        return view('pages.upah.index')->with(compact('upah','karyawan'));
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
        $request->validate([
            'role'                  => 'required',
            'gaji_pokok'            => 'required', 
            'tunjangan_makan'       => 'required',
            'tunjangan_transport'   => 'required'
        ]);

        Upah::create([
            'role'                  => request('role'),
            'gaji_pokok'            => request('gaji_pokok'), 
            'tunjangan_makan'       => request('tunjangan_makan'),
            'tunjangan_transport'   => request('tunjangan_transport')
        ]);

        return back()->with('message', 'Data Berhasil ditambahkan');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $upah = Upah::find(base64_decode($id));
        // return base64_decode($id);
        // return $upah;
        return view('pages.upah.show')->with(compact('upah'));
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
            'role'                  => 'required',
            'gaji_pokok'            => 'required',
            'tunjangan_makan'       => 'required',
            'tunjangan_transport'   => 'required'
        ]);

        $upah = Upah::find($id);

        $upah->update([
            'role'                  =>request('role'),
            'gaji_pokok'            => request('gaji_pokok'),
            'tunjangan_makan'       => request('tunjangan_makan'),
            'tunjangan_transport'   => request('tunjangan_transport')
        ]);

        return back()->with('message', 'Upah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upah = Upah::find($id);
        $upah->delete();
        return redirect('/upah')->with('message', 'Upah berhasil dihapus');
    }
}
