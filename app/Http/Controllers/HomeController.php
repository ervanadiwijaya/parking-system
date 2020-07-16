<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisKendaraan;
use App\Parkir;
use App\User;
use App\Transaksi;
use DB;

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

        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d');

        return view('pages.laporan.index')->with(compact('laporan', 'start_date', 'end_date'));
    }
    
    public function laporanCreate(Request $request){
        $this->validate($request, [
            '_get'          => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
        ]);

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $_get_method = $request->input('_get');

        $laporan = Transaksi::with('parkir.jenis')
        ->whereDate('created_at', '<=', $end_date)
        ->whereDate('created_at', '>=', $start_date)
        ->orderBy('created_at', 'desc')->get();
        
        if ($_get_method == 'cetak') {
            return view('pages.cetak.parkir_laporan')->with(compact('laporan', 'start_date', 'end_date'));
        }
        return view('pages.laporan.index')->with(compact('laporan', 'start_date', 'end_date'));
    }

    public function chartParkir(){
        $labels = [];
        $dataset_all = [];
        $months = [];

        $jenis_list = JenisKendaraan::get();

        $months_list = ['January', 'February', 'March', 'April', 'Mey', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $color_list = ['red', 'blue', 'yellow', 'orange'];
        $xc = 0;
        foreach ($jenis_list as $item) {
            $dataset = DB::table('parkir')->select(
                DB::raw('YEAR(created_at) year'), 
                DB::raw('MONTH(created_at) month'),
                DB::raw('count(id) as total'),
            )
            ->whereYear('created_at', date('Y'))
            ->where('status', true)
            ->where('jenis_kendaraan_id', $item->id)
            ->groupby('month', 'year')
            ->orderby('month', 'asc')
            ->get();

            array_push($dataset_all, [
                'label' => $item->name,
                'borderColor' => $color_list[$xc] ?? null,
                'data'  => $dataset
            ]);
            $xc++;
        }
        
        $dataset_new_all = [];
        foreach ($dataset_all as $item) {
            $dataset_new = [];
            $i = 0;
            $j = 0;
            while(count($dataset_new) != date('m')){
                if($item['data'][$j]->month == $i +1){
                    array_push($dataset_new, $item['data'][$j]->total);
                    if ($j < count($item['data']) -1) {
                        $j++;
                    }
                }else{
                    array_push($dataset_new, 0);
                    // array_push($dataset_new, [
                    //     'year'  => date('Y'),
                    //     'month' => $i +1,
                    //     'total' => 0
                    // ]);
                }
                $i++;
            }
            $item['data'] = $dataset_new;
            array_push($dataset_new_all, $item);
        }

        return response()->json([
            'labels'    => $months_list,
            'data'    => $dataset_new_all,
        ], 200);
    }
}
