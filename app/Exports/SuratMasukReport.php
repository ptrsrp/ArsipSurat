<?php

namespace App\Exports;

use App\SuratMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;

class SuratMasukReport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    // public function collection()
    // {
    //     return SuratMasuk::all();
    // }
    public function view(): View
    {
        return view('halaman.surat.surat-masuk.cetak', [
            'surat_masuk' => SuratMasuk::with('instansi')->orderBy('tgl_diterima','ASC')->get()
        ]);
    }
}
