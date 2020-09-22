<?php

namespace App;

use App\Pegawai;
use App\SuratMasuk;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = 'disposisi';
    protected $primaryKey ='id';
    protected $fillable =[
        'id_surat_masuk','nippos_pgw','isi'
    ];

    public function surat_masuk()
    {
        return $this->belongsTo(SuratMasuk::class, 'id_surat_masuk');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nippos_pgw');
    }
}
