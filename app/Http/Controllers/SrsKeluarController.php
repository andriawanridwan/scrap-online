<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TujuanIot;
use App\Srs_Keluar;
class SrsKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('srs.srs_keluar.srs_keluar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        $tujuan = TujuanIot::all();
        $model = new Srs_Keluar();
        return view('srs.srs_keluar.form_srs_keluar',compact('model','tujuan'));
    }

     public function Datatable(){
        $model = Srs_Keluar::query()->with('rel_tujuan');
        return Datatables()::of($model)
            ->addColumn('action',function($model){
                return view('layouts._action', [
                    'url_edit'      => route('srskeluar.edit',$model->id),
                    'url_destroy'   => route('srskeluar.destroy',$model->id),
                    'edit_title'    => 'Edit SRS Selesai',
                    'big_modal'     => 'big-modal'
                ]);
            })
            ->editColumn('tujuan',function($model){
                return $model->rel_tujuan->tujuan_iot;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tanggal_keluar'    => 'required',
            'tujuan'    => 'required',
            'jenis_transaksi'   => 'required',
            'kategori_pengurangan'  => 'required',
            'no_spr'    => 'required',
            'qty'   => 'required',
            'satuan'    => 'required',
            'kategori'  => 'required',
            'keterangan'    => 'required'
        ]);
        Srs_Keluar::create($request->all());
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
        $tujuan = TujuanIot::all();
        $model = Srs_Keluar::findOrFail($id);
        return view('srs.srs_keluar.form_srs_keluar',compact('model','tujuan'));
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
        $this->validate($request,[
            'tanggal_keluar'    => 'required',
            'tujuan'    => 'required',
            'jenis_transaksi'   => 'required',
            'kategori_pengurangan'  => 'required',
            'no_spr'    => 'required',
            'qty'   => 'required',
            'satuan'    => 'required',
            'kategori'  => 'required',
            'keterangan'    => 'required'
        ]);
        $data = Srs_Keluar::findOrFail($id);
        $data->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data = Srs_Keluar::findOrFail($id);
        $data->delete();
    }
}
