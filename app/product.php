<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table ='product';
    public $timestamps =false;

    protected $fillable =['nama_barang','jenis_barang','jumlah_barang','harga_barang','id_petugas'];
}
