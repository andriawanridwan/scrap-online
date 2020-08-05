<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iot_Selesai;
use App\JenisHasilIot;
use App\Keranjang;
use DateTime;
use App\Transaksi;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::select('kode_transaksi')->orderBy('id','desc')->first();
        $date = new DateTime();
        if($transaksi != null){
            $bulan = $date->format('m');
            $bulantran = substr($transaksi->kode_transaksi,4,2);
            if($bulan == $bulantran){
                $pcod = substr($transaksi->kode_transaksi,11);
                $codplus = (int)$pcod + 1;
                $codigit = sprintf("%05s",$codplus);
                $kode = 'T/'.$date->format('dmY'). '/'.$codigit;
            }else{
                $kode = 'T/'.$date->format('dmY'). '/00001';
            }
        }else{
            $kode = 'T/'.$date->format('dmY'). '/00001';
        }
        return view('transaksi',compact('kode'));
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

    public function perbulan(){
        return Transaksi::selectRaw('year(tanggal) year, month(tanggal) month, count(*) total')
                            ->groupBy('year','month')->whereRaw('year(tanggal) = year(now()) ' )->get();
    }

    public function pertahun(){
        return Transaksi::selectRaw('year(tanggal) year, count(*) total')
                            ->groupBy('year')->get();
    }

    public function highbarang(){
        return Transaksi::selectRaw('count(barang) total, barang')->groupBy('barang')->get();
    }

    public function caribarang(){
        $barang = JenisHasilIot::all();
        
        return view('caribarang',compact('barang'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function selesai(Request $request){
        $keranjang = Keranjang::all();
        $total = 0;
        
        $pbayar = explode( "Rp. ",$request->bayar);
        
        $fbayar = str_replace('.','',$pbayar[1]);
        foreach($keranjang as $k){
            Transaksi::insert([
                'kode_transaksi' => $request->kode_transaksi,
                'tanggal'        => $request->tanggal,
                'no_spr'         => $request->no_spr,
                'pembeli'        => $request->pembeli,
                'penerima'       => $request->penerima,
                'barang'         => $k->barang,
                'harga'          => $k->harga,
                'satuan'         => $k->satuan,
                'qty'            => $k->qty,
                'subtotal'       => $k->harga * $k->qty,
                'bayar'          => $fbayar,
            ]);
            $jenishasil = JenisHasilIot::where('jenis_hasil_iot',$k->barang)->first();
            $jenishasil->update([
                'qty'   => (int)$jenishasil->qty - (int)$k->qty, 
            ]);
            $total += $k->harga * $k->qty;
        }
        Transaksi::where('kode_transaksi',$request->kode_transaksi)->update([
            'total' => $total,
            'kembali' => (int)$fbayar - (int)$total
            ]);
        Keranjang::truncate();
        
        return 'berhasil';
        
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
    public function destroy($id)
    {
        //
    }
}
