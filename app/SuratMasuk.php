<?php

namespace App;

use App\Instansi;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'surat_masuk';
    protected $primaryKey ='id';
    protected $fillable =[
        'no_agenda','tgl_diterima','id_instansi','no_surat','tgl_surat',
        'perihal','file',
    ];
    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }
}
