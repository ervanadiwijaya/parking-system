<?php

namespace App\Http\Controllers;

use App\Parkir;
use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with('parkir.jenis')->whereDate('created_at', now())->orderBy('created_at', 'desc')->get();
        return view('pages.parkir.keluar.index')->with(compact('transaksi'));
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

    public function _createTransaksi($kode_parkir){
        $transaksi = Transaksi::where('parkir_id',substr($kode_parkir, 4))->first();
        if ($transaksi != null) {
            return false;
        }

        $keluar_date = strtotime(now());
        $parkir = Parkir::with('jenis')->findOrfail(substr($kode_parkir, 4));
        $masuk_date =strtotime($parkir->created_at);
        
        // data perhitungan waktu dari sini: https://www.geeksforgeeks.org/how-to-calculate-the-difference-between-two-dates-in-php/
        $diff = abs($keluar_date - $masuk_date); 
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
        $days = floor(($diff - $years * 365*60*60*24 -  $months*30*60*60*24)/ (60*60*24));
        $hours = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 
        $minutes = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24  - $hours*60*60)/ 60); 
        
        $total_menit = $hours * 60 + $minutes;
        if ($total_menit == 0) {
            $total_menit = 1;
        }

        $tagihan = 0;
        if ($hours <= 2) {
            $tagihan = $parkir->jenis->tarif_awal;
        }else{
            $tagihan = $parkir->jenis->tarif_perjam * $hours;
            if ($tagihan >= $parkir->jenis->tarif_max) {
                $tagihan = $parkir->jenis->tarif_max;
            }
        }

        $parkir->status = true;
        $parkir->update();

        Transaksi::create([
            'parkir_id'     => $parkir->id,
            'lama_parkir'   => $total_menit, 
            'tarif'         => $parkir->jenis->tarif_perjam,
            'tagihan'       => $tagihan,
            'created_at'    => date('Y-m-d H:i:s', $keluar_date)
        ]);

        return true;
    }

    public function apiStore(Request $request){
        $request->validate([
            'kode_parkir'     => 'required'
        ]);

        if (!$this->_createTransaksi($request->input('kode_parkir'))) {
            return response()->json([
                'message'   => 'Data sudah ada'
            ], 409);
        };

        return response()->json([
            'message'   => 'Data berhasil ditambahkan'
        ], 201);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_parkir'     => 'required'
        ]);

        if (!$this->_createTransaksi($request->input('kode_parkir'))) {
            return back()->with('error', 'Data sudah ada');
        };

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
