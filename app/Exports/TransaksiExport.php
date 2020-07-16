<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Transaksi;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransaksiExport implements FromArray, WithMapping, WithHeadings
{
    protected $transaksi;

    public function __construct(array $transaksi)
    {
        $this->transaksi = $transaksi;
    }

    public function array(): array
    {
        return $this->transaksi;
    }

    public function map($registration) : array {
        $lama_parkir = $registration['lama_parkir'];
        if ($lama_parkir >= 60) {
            $lama_parkir = floor($lama_parkir / 60).' jam, '.$lama_parkir % 60 .' menit';
        }else{
            $lama_parkir = $lama_parkir .' menit';
        }

        return [
            $registration['id'],
            $registration['parkir']['kode_parkir'],
            $registration['parkir']['no_polisi'],
            Carbon::parse($registration['parkir']['created_at'])->toFormattedDateString(),
            Carbon::parse($registration['created_at'])->toFormattedDateString(),
            $lama_parkir,
            $registration['tarif'],
            $registration['parkir']['jenis']['name'],
            $registration['tagihan']
        ] ;
    }

    public function headings() : array {
        return [
           '#',
           'Kode Parkir',
           'No Polisi',
           'Waktu Masuk',
           'Waktu Keluar',
           'Lama Parkir',
           'Tarif / Jam',
           'Kendaraan',
           'Tagihan',
        ] ;
    }
}
