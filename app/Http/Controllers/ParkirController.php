<?php

namespace App\Http\Controllers;

use App\Parkir;
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
        //
        $parkir = Parkir::All();
        return view('admin.parkir', compact('parkir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.parkir.create');

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
            'jenis_kendaraan_id' => 'required',
            'prefix' => 'required',
            'name' => 'required',
            'no_polisi' => 'required',
            'status' => 'required',
            'created_at' => 'required'
        ]);
        Parkir :: create([
            'jenis_kendaraan_id' => request('jenis_kendaraan_id'),
            'prefix' => request('prefix'),
            'name' => request('name'),
            'no_polisi' => request('no_polisi'),
            'status' => request('status'),
            'created_at' => now()
        ]);

        return redirect('admin/parkir')->with('flash_message', 'parkir telah ditambah!');
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
