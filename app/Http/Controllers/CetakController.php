<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parkir;

class CetakController extends Controller
{
    public function tiketParkir($id){
        $id = substr($id, 4);
        $data = Parkir::with('jenis', 'transaksi')->findOrfail($id);

        return view('pages.cetak.parkir_tiket')->with(compact('id', 'data'));
    }
}
