<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table ='order';
    public $timestamps = false;

    protected $fillable =['kode_barang','tgl_pesan','jumlah_pesanan','id_customers'];
}
