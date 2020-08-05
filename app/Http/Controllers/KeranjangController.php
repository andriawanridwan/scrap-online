<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keranjang;
use App\JenisHasilIot;
class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Keranjang::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateqty(Request $request){
       $data = Keranjang::where('barang', $request->barang);
       $data->update(['qty' => $request->qty]);
    }

    public function cekqty(Request $request){
        
        $jenis = JenisHasilIot::where('jenis_hasil_iot',$request->barang)->first();
            if($request->qty > $jenis->qty){
                return $response = ['status' => 'Gagal', 'message' => $jenis->qty];
            }else{
               
                return $response = ['status' => 'Berhasil', 'qty' => $request->qty];
            }
        return $jenis;
    }

    public function store(Request $request)
    {
        $jenis = JenisHasilIot::findOrFail($request->id);
        
            if($jenis->qty != 0){
                Keranjang::insert([
                    'barang'    => $jenis->jenis_hasil_iot,
                    'harga'     => $jenis->harga,
                    'satuan'    => $jenis->satuan,
                    'qty'       => 1
                ]);
            }
            else{
                $response['status'] = 'error';
                $response['message'] = 'Stok Kosong';
                return $response;
            }       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus(Request $request){
         Keranjang::findOrFail($request->id)->delete();

    }
    public function destroy($id)
    {
        Keranjang::findOrFail($id)->delete();
    }
}
