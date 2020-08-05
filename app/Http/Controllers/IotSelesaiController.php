<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iot_selesai;
use App\JenisHasilIot;
class IotSelesaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('iot.iot_selesai.iot_selesai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenishasil = JenisHasilIot::all();
        $model = new Iot_selesai();
        return view('iot.iot_selesai.form_iot_selesai',compact('model','jenishasil'));
    }

    public function Datatable(){
        $model = Iot_Selesai::query()->with('jenishasil');
        return Datatables()::of($model)
            ->addColumn('action',function($model){
                return view('layouts._action', [
                    'url_edit'      => route('iotselesai.edit',$model->id),
                    'url_destroy'   => route('iotselesai.destroy',$model->id),
                    'edit_title'    => 'Edit IOT Selesai',
                    'big_modal'     => 'big-modal'
                ]);
            })
            ->addColumn('rel_jenishasil',function($model){
                return $model->jenishasil->jenis_hasil_iot;
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
            'tanggal_selesai'    => 'required',
            'no_rbap'            => 'required',
            'tanggal_rbap'       => 'required',
            'produk_kemasan'     => 'required',
            'jenis_hasil'        => 'required',
            'qty'                => 'required',
            'satuan'             => 'required'
        ]);

        $jenis = JenisHasilIot::findorFail($request->jenis_hasil);
        $hasil = (int)$jenis['qty'] + (int)$request['qty'];
        $jenis->update(['qty' => $hasil]);


        Iot_Selesai::create($request->all());
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
        $jenishasil = JenisHasilIot::all();
        $model = Iot_selesai::findOrFail($id);
        return view('iot.iot_selesai.form_iot_selesai',compact('model','jenishasil'));
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
            'tanggal_selesai'    => 'required',
            'no_rbap'            => 'required',
            'tanggal_rbap'       => 'required',
            'produk_kemasan'     => 'required',
            'jenis_hasil'        => 'required',
            'qty'                => 'required',
            'satuan'             => 'required'
        ]);
        $data = Iot_Selesai::findOrFail($id);
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
        $data = Iot_Selesai::findOrFail($id);
        $data->delete();
    }
}
