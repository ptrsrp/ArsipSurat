<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = 'instansi';
    protected $primaryKey ='id';
    protected $fillable =[ 
    'nama','alamat'];
}
