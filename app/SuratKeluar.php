<?php

namespace App;

use App\Instansi;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_keluar';
    protected $primaryKey ='id';
    protected $fillable =[
        'tgl_kirim','no_surat','penerima',
        'perihal','file',
    ];
    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'penerima');
    }
}
