<?php

namespace App\Http\Controllers;

use App\Parkir;
use App\JenisKendaraan;
use Illuminate\Http\Request;

class ParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkir = Parkir::with('jenis')
        ->where('status', false)
        ->whereDate('created_at', now())
        ->orderBy('created_at', 'desc')
        ->get();

        // return $parkir;
        $jenis_kendaraan = JenisKendaraan::orderBy('created_at')->get();
        return view('pages.parkir.masuk.index')->with(compact('parkir', 'jenis_kendaraan'));
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
            'jenis_kendaraan'       => 'required',
            'no_polisi'             => 'required',
        ]);

        Parkir::create([
            'jenis_kendaraan_id'    => request('jenis_kendaraan'),
            'no_polisi'             => strtoupper(request('no_polisi')),
            'status'                => false,
            'created_at'            => now()
        ]);

        return back()->with('message', 'Data berhasil ditambahkan');
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
        //
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
