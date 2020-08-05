<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisHasilIot;
use App\Srs_Selesai;
class SrsSelesaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('srs.srs_selesai.srs_selesai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenishasil = JenisHasilIot::all();
        $model = new Srs_Selesai();
        return view('srs.srs_selesai.form_srs_selesai',compact('model','jenishasil'));
    }

    public function Datatable(){
        $model = Srs_Selesai::query()->with('jenishasil');
        return Datatables()::of($model)
            ->addColumn('action',function($model){
                return view('layouts._action', [
                    'url_edit'      => route('srsselesai.edit',$model->id),
                    'url_destroy'   => route('srsselesai.destroy',$model->id),
                    'edit_title'    => 'Edit SRS Selesai',
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

        Srs_Selesai::create($request->all());
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
        $model = Srs_Selesai::findOrFail($id);
        return view('srs.srs_selesai.form_srs_selesai',compact('model','jenishasil'));
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
        $data = Srs_Selesai::findOrFail($id);
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
        $data = Srs_Selesai::findOrFail($id);
        $data->delete();
    }
}
