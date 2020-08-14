<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\stok;
use Illuminate\Support\Facades\Validator;
class stokController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama_barang' => 'required',
                'tgl_stok' => 'required',
            ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $simpan = stok::create([
            'nama_barang' => $request->nama_barang,
            'tgl_stok' => $request->tgl_stok,
        ]);

        if($simpan) {
            return Response()->json(['status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
