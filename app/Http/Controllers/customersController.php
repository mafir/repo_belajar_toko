<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customers;
use Illuminate\Support\Facades\Validator;
class customersController extends Controller
{
    //
    public function show()
    {
        return customers::all();
    }
    public function detail()
    {
        $flight = customers::find($id);
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama_customers' => 'required',
                'alamat' => 'required',
                'provinsi' => 'required',
                'kabupaten' => 'required',
                'kode_pos' => 'required',
                'nomor_hp' => 'required'
            ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $simpan = customers::create([
            'nama_customers' => $request->nama_customers,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kode_pos' => $request->kode_pos,
            'nomor_hp' => $request->nomor_hp
        ]);
        if($simpan) {
            return Response()->json(['status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
