<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisKendaraan;
use App\Parkir;
use App\User;

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
        $parkir_keluar = Parkir::where('status', true)->whereDate('created_at', now())->count();;
        $jenis_kendaraan = JenisKendaraan::count();
        $karyawan = User::count();
        $today = date('d-m-Y');
        return view('pages.dashboard')->with(compact('parkir_masuk', 'parkir_keluar', 'jenis_kendaraan', 'karyawan', 'today'));
    }
}
