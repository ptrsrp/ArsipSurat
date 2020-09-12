<?php

namespace App;

use App\Bagian;
use App\Jabatan;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey ='nippos';
    protected $fillable =[
        'nippos','nama','id_bagian','id_jabatan',
    ];

    public function bagian()
    {
        return $this->belongsTo(Bagian::class, 'id_bagian');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}
