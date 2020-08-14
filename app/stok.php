<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    protected $table ='stok';
    public $timestamps =false;

    protected $fillable =['nama_barang','tgl_stok'];
}
