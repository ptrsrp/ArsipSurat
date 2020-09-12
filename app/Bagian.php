<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $table = 'bagian';
    protected $primaryKey ='id';
    protected $fillable =['nama'];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
