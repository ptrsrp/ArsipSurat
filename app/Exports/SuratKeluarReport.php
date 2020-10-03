<?php

namespace App\Exports;

use App\SuratKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;

class SuratKeluarReport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    // public function collection()
    // {
    //     return SuratKeluar::all();
    // }
    public function view(): View
    {
        return view('halaman.surat.surat-keluar.cetak', [
            'surat_keluar' => SuratKeluar::with('instansi')->orderBy('tgl_kirim','ASC')->get()
        ]);
    }
}
