<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey ='id';
    protected $fillable =['nama'];
    
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}