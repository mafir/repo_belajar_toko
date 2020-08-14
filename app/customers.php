<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $table = 'customers';
    public $timestamps =false;

    protected $fillable =['nama_customers','alamat','provinsi','kabupaten','kode_pos','nomor_hp'];
}
