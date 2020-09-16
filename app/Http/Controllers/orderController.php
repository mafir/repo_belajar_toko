<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use Illuminate\Support\Facades\Validator;
class orderController extends Controller
{
    //
    public function show()
    {
        $data_order = order::leftjoin('customers', 'order.id_customers', 'customers.id_customers')
                            ->leftjoin('product', 'order.kode_barang', 'product.id_barang')
                            ->select('order.id_transaksi',
                                     'order.jumlah_pesanan',
                                     'order.tgl_pesan',
                                     'product.id_barang',
                                     'customers.id_customers',
                                     'customers.nama_customers')
                            ->get();
        return Response()->json($data_order);
    }
    public function detail($id)
    {
        if(order::where('id_transaksi', $id)->exists()){
            $data_order = order::leftjoin('customers', 'customer.id_customers', 'order.id_customers')
                                    ->where('order.id', '=', $id)
                                    ->get();
            return Response()->json($data_order);
        }
        else{
            return Response()->json(['message' => 'Tidak Ditemukan']);
        }
    }
    public function update($id, Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'kode_barang' => 'required',
            'tgl_pesan' => 'required',
            'jumlah_pesanan' => 'required',
            'id_customers' => 'required'
        ]
    );
        if($validator->fails()){
            return Response()->json($validator->errors());
    }
        $ubah = order::where('id_transaksi', $id)->update([
            'kode_barang' => $request->kode_barang,
            'tgl_pesan' => $request->tgl_pesan,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'id_customers' => $request->id_customers
        ]);
        
        if($ubah){
            return Response()->json(['status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
    public function destroy($id)
    {
        $hapus = order::where('id_transaksi', $id)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }      
}   