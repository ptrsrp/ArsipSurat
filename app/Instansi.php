<?php

namespace App;

use App\SuratMasuk;
use App\SuratKeluar;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = 'instansi';
    protected $primaryKey ='id';
    protected $fillable =[ 
    'nama','alamat'];

    public function surat_masuk()
    {
        return $this->hasMany(SuratMasuk::class);
    }
    public function surat_keluar()
    {
        return $this->hasMany(SuratKeluar::class);
    }
}