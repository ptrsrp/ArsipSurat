<?php

namespace App\Http\Controllers;
use PDF;
use File;
use DataTables;
use App\Instansi;
use App\SuratMasuk;
use Illuminate\Http\Request;
use App\Exports\SuratMasukReport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class SuratMasukController extends Controller
{
    public function json(Request $request){
            $surat_masuk = SuratMasuk::with('instansi')->latest()->get();
            return Datatables::of($surat_masuk)
            ->editColumn('file', function($surat_masuk){
                $file = $surat_masuk->file;
                    return '<a href="'.url('storage/arsip/surat-masuk/'.$file.'').'" target="_blank">
                    Lihat Dokumen</a>';
            })
            ->editColumn('instansi', function($surat_masuk){
                return $surat_masuk->instansi->nama;
            })
            ->addColumn('action', function ($surat_masuk) {
                return '<form action="/hapus-surat-masuk/'.$surat_masuk->id.'" method="POST">'.csrf_field().' 
                <input type="hidden" name="_method" value="DELETE" class="form-control">
                <a href="/edit-surat-masuk/'.$surat_masuk->id.'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <button type="submit" onclick="return confirm_delete()" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></form>'; 
            })
            ->rawColumns(['file','action'])
            ->make(true);
    }
    public function index(){
        return view('halaman.surat.surat-masuk.index');
    }
    public function create(){
        $instansi = Instansi::orderBy('nama','ASC')->get();
        return view('halaman.surat.surat-masuk.tambah', compact('instansi'));
    }

    public function store(Request $request){
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'mimes' => 'extensi :attribute hanya pdf, jpg, png, dan docx!',
            'max' => ':attribute max berukuran 3MB!'
        ];
        $this->validate($request,[
    		'no_agenda' => 'required',
    		'tgl_diterima' => 'required',
    		'id_instansi' => 'required',
    		'no_surat' => 'required',
    		'tgl_surat' => 'required',
    		'perihal' => 'required',
    		'file' => 'required|mimes:pdf,jpeg,jpg,png,docx|max:3048',
        ], $messages);

        $file = $request->file('file');
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storage/arsip/surat-masuk'), $filename);

        SuratMasuk::create([
            'no_agenda' => $request->no_agenda,
            'tgl_diterima' => $request->tgl_diterima,
            'id_instansi' => $request->id_instansi,
            'no_surat' => $request->no_surat,
            'tgl_surat' => $request->tgl_surat,
            'perihal' => $request->perihal,
            'file' => $filename
        ]);
        return redirect()->route('surat-masuk')->with('success','Data Berhasil Ditambahkan!');
    }

    public function edit($id){
        $instansi = Instansi::orderBy('nama','ASC')->get();
        $surat_masuk = SuratMasuk::findorfail($id);
        return view('halaman.surat.surat-masuk.edit', compact('instansi','surat_masuk'));
    }
    public function update(Request $request, $id){
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'mimes' => 'extensi :attribute hanya pdf, jpg, png, dan docx!',
            'max' => ':attribute max berukuran 3MB!'
        ];
        $this->validate($request,[
            'no_agenda' => 'required',
            'tgl_diterima' => 'required',
            'id_instansi' => 'required',
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'perihal' => 'required',
            'file' => 'mimes:pdf,jpeg,jpg,png,docx|max:3048',
        ], $messages);
        $surat_masuk = SuratMasuk::findorfail($id);
        if ($request->has('file') != '') {
            //hapus dahulu file lama
            $file_lama = $surat_masuk->file;
            File::delete('storage/arsip/surat-masuk/'.$file_lama);

            $file = $request->file('file');
            $filename = time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/arsip/surat-masuk'), $filename);
        }
        else{
            $filename = $surat_masuk->file;
        }
        $surat_masuk->update([
            'no_agenda' => $request->no_agenda,
            'tgl_diterima' => $request->tgl_diterima,
            'id_instansi' => $request->id_instansi,
            'no_surat' => $request->no_surat,
            'tgl_surat' => $request->tgl_surat,
            'perihal' => $request->perihal,
            'file' => $filename,
        ]);
        return redirect()->route('surat-masuk')->with('success','Data Berhasil Diubah!');
    }
    public function destroy($id){
        $surat_masuk = SuratMasuk::findorfail($id);
        //hapus file dari folder
        File::delete('storage/arsip/surat-masuk/'.$surat_masuk->file);
        //hapus data di database
        $surat_masuk->delete();
        return redirect()->route('surat-masuk')->with('info','Data Berhasil Dihapus!');
    }
    public function periode(){
        return view('halaman.surat.surat-masuk.periode-surat');
    }
    public function show($tgl_awal,$tgl_akhir){
        $surat_masuk = SuratMasuk::with('instansi')->whereBetween('tgl_diterima',[$tgl_awal,$tgl_akhir])->orderBy('tgl_diterima','ASC')->get();
        return view('halaman.surat.surat-masuk.show-laporan',compact('surat_masuk','tgl_awal','tgl_akhir'));
    }
    public function cetakPDF(){
        $surat_masuk = SuratMasuk::with('instansi')->orderBy('tgl_diterima','ASC')->get();
        $pdf = PDF::loadview('halaman.surat.surat-masuk.cetak',compact('surat_masuk'));
        return $pdf->download('laporan-surat-masuk-pdf');
    }
    public function cetakExcel(){
        return Excel::download(new SuratMasukReport, 'laporan-surat-masuk-excel.xlsx');
    }
    
}