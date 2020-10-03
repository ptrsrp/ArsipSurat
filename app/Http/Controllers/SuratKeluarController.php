<?php

namespace App\Http\Controllers;
use PDF;
use File;
use DataTables;
use App\Instansi;
use App\SuratKeluar;
use Illuminate\Http\Request;
use App\Exports\SuratKeluarReport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class SuratKeluarController extends Controller
{
    public function json(){
        $surat_keluar = SuratKeluar::with('instansi')->latest()->get();
        return Datatables::of($surat_keluar)
        ->editColumn('file', function($surat_keluar){
            $file = $surat_keluar->file;
                return '<a href="'.url('storage/arsip/surat-keluar/'.$file.'').'" target="_blank">
                Lihat Dokumen</a>';
        })
        ->editColumn('penerima', function($surat_keluar){
            return $surat_keluar->instansi->nama;
        })
        ->addColumn('action', function ($surat_keluar) {
            return '<form action="/hapus-surat-keluar/'.$surat_keluar->id.'" method="POST">'.csrf_field().' 
            <input type="hidden" name="_method" value="DELETE" class="form-control">
            <a href="/edit-surat-keluar/'.$surat_keluar->id.'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <button type="submit" onclick="return confirm_delete()" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></form>'; 
            
        })
        ->rawColumns(['file','action'])
        ->make(true);
    }
    public function index(){
        return view('halaman.surat.surat-keluar.index');
    }
    public function create(){
        $instansi = Instansi::orderBy('nama','ASC')->get();
        return view('halaman.surat.surat-keluar.tambah', compact('instansi'));
    }
    public function store(Request $request){
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'mimes' => 'extensi :attribute hanya pdf, jpg, png, dan docx!',
            'max' => ':attribute max berukuran 3MB!'
        ];
        $this->validate($request,[
    		'tgl_kirim' => 'required',
    		'penerima' => 'required',
    		'no_surat' => 'required',
    		'perihal' => 'required',
    		'file' => 'required|mimes:pdf,jpeg,jpg,png,docx|max:3048',
        ], $messages);

        $file = $request->file('file');
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storage/arsip/surat-keluar'), $filename);

        SuratKeluar::create([
            'tgl_kirim' => $request->tgl_kirim,
            'penerima' => $request->penerima,
            'no_surat' => $request->no_surat,
            'perihal' => $request->perihal,
            'file' => $filename
        ]);
        return redirect()->route('surat-keluar')->with('success','Data Berhasil Ditambahkan!');
    }
    public function edit($id){
        $instansi = Instansi::orderBy('nama','ASC')->get();
        $surat_keluar = SuratKeluar::findorfail($id);
        return view('halaman.surat.surat-keluar.edit', compact('instansi','surat_keluar'));
    }
    public function update(Request $request, $id){
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'mimes' => 'extensi :attribute hanya pdf, jpg, png, dan docx!',
            'max' => ':attribute max berukuran 3MB!'
        ];
        $this->validate($request,[
            'tgl_kirim' => 'required',
    		'penerima' => 'required',
    		'no_surat' => 'required',
    		'perihal' => 'required',
    		'file' => 'mimes:pdf,jpeg,jpg,png,docx|max:3048',
        ], $messages);
        $surat_keluar = SuratKeluar::findorfail($id);
        if ($request->has('file') != '') {
            //hapus dahulu file lama
            $file_lama = $surat_keluar->file;
            File::delete('storage/arsip/surat-keluar/'.$file_lama);

            $file = $request->file('file');
            $filename = time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/arsip/surat-keluar'), $filename);
        }
        else{
            $filename = $surat_keluar->file;
        }
        $surat_keluar->update([
            'tgl_kirim' => $request->tgl_kirim,
            'penerima' => $request->penerima,
            'no_surat' => $request->no_surat,
            'perihal' => $request->perihal,
            'file' => $filename
        ]);
        return redirect()->route('surat-keluar')->with('success','Data Berhasil Diubah!');
    }
    public function destroy($id){
        $surat_keluar = SuratKeluar::findorfail($id);
        //hapus file dari folder
        File::delete('storage/arsip/surat-keluar/'.$surat_keluar->file);
        //hapus data di database
        $surat_keluar->delete();
        return redirect()->route('surat-keluar')->with('info','Data Berhasil Dihapus!');
    }
    public function periode(){
        return view('halaman.surat.surat-keluar.periode-surat');
    }
    public function show($tgl_awal,$tgl_akhir){
        $surat_keluar = SuratKeluar::with('instansi')->whereBetween('tgl_kirim',[$tgl_awal,$tgl_akhir])->orderBy('tgl_kirim','ASC')->get();
        return view('halaman.surat.surat-keluar.show-laporan',compact('surat_keluar','tgl_awal','tgl_akhir'));
    }
    public function cetakPDF(){
        $surat_keluar = SuratKeluar::with('instansi')->orderBy('tgl_kirim','ASC')->get();
        $pdf = PDF::loadview('halaman.surat.surat-keluar.cetak',compact('surat_keluar'));
        return $pdf->download('laporan-surat-keluar-pdf');
    }
    public function cetakExcel(){
        return Excel::download(new SuratKeluarReport, 'laporan-surat-keluar-excel.xlsx');
    }
}
