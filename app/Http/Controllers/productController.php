<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\Facades\Validator;
class productController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama_barang' => 'required',
                'jumlah_barang' => 'required',
                'jenis_barang' => 'required',
                'harga_barang' => 'required',
                'id_petugas' => 'required'
            ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $simpan = product::create([
            'nama_barang' => $request->nama_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'jenis_barang' => $request->jenis_barang,
            'harga_barang' => $request->harga_barang,
            'id_petugas' => $request->id_petugas
        ]);

        if($simpan) {
            return Response()->json(['status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
