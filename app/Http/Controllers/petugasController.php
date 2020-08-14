<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\petugas;
use Illuminate\Support\Facades\Validator;
class petugasController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama_petugas' => 'required',
                'alamat' => 'required',
                'email_petugas' => 'required',
                'gender' => 'required'
            ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $simpan = petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'alamat' => $request->alamat,
            'email_petugas' => $request->email_petugas,
            'gender' => $request->gender
        ]);

        if($simpan) {
            return Response()->json(['status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
