<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisKendaraan;
use App\Parkir;
use App\User;
use App\Transaksi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $parkir_masuk = Parkir::where('status', false)->whereDate('created_at', now())->count();
        $parkir_keluar = Parkir::where('status', true)->whereDate('created_at', now())->count();
        $jenis_kendaraan = JenisKendaraan::count();
        $karyawan = User::count();
        $today = date('d-m-Y');
        return view('pages.dashboard')->with(compact('parkir_masuk', 'parkir_keluar', 'jenis_kendaraan', 'karyawan', 'today'));
    }

    public function laporan(){
        $laporan = Transaksi::with(['parkir.jenis'], ['parkir' => function($q){
                $q->whereDate('created_at', now()); // start date
        }])
        ->whereDate('created_at', now()) // end date
        ->orderBy('created_at', 'desc')
        ->get();

        return view('pages.laporan.index')->with(compact('laporan'));
    }
    
    public function laporanCreate(Request $request){
        $this->validate($request, [
            '_get'          => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
        ]);

        $_get_method = $request->input('_get');

        $laporan = Transaksi::with(['parkir.jenis'], ['parkir' => function($q){
            $q->whereDate('created_at', $request->input('start_date')); // start date
        }])
        ->whereDate('created_at', $request->input('end_date')) // end date
        ->orderBy('created_at', 'desc')
        ->get();

       if ($_get_method == 'cetak') {
          return redirect('/cetak/laporan');
       }
        return view('pages.laporan.index')->with(compact('laporan'));
    }
}
