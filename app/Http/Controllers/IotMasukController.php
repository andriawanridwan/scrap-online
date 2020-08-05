<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iot_Masuk;
use App\Workcenter;
use App\Plant;
use App\DeptIot;
use Datatable;
use JenisHasilIot;
class IotMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('iot.iot_masuk.iot_masuk');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workcenter = Workcenter::all();
        $plant      = Plant::all();
        $deptiot    = DeptIot::all();
        $model = new Iot_Masuk();
        return view('iot.iot_masuk.add_iot_masuk',compact('model','plant','deptiot','workcenter'));
    }


    public function Datatable(){
        $model = Iot_Masuk::query()->with(['rel_dept','rel_plant','rel_workcenter']);
        return Datatables()::of($model)
            ->addColumn('action',function($model){
                return view('layouts._action', [
                    'url_edit'      => route('iotmasuk.edit',$model->id),
                    'url_destroy'   => route('iotmasuk.destroy',$model->id),
                    'edit_title'    => 'Edit IOT Masuk',
                    'big_modal'     => 'big-modal'
                ]);
            })
            ->addColumn('rel_dept',function($model){
                return $model->rel_dept->deptiot;
            })
            ->addColumn('rel_plant',function($model){
                return $model->rel_plant->plant;
            })
            ->addColumn('rel_workcenter',function($model){
                return $model->rel_workcenter->workcenter;
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
            'bulan' => 'required',
            'tanggal_date' => 'required',
            'no_dokumen' => 'required',
            'dept' => 'required',
            'workcenter' => 'required',
            'plant' => 'required',
            'qty' => 'required|numeric',
            'satuan' => 'required',
        ]);
        

        Iot_Masuk::create($request->all());
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
        $workcenter = Workcenter::all();
        $plant      = Plant::all();
        $deptiot    = DeptIot::all();
        $model = Iot_Masuk::findOrFail($id);
        return view('iot.iot_masuk.add_iot_masuk',compact('model','workcenter','plant','deptiot'));
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
            'bulan' => 'required',
            'tanggal_date' => 'required',
            'no_dokumen' => 'required',
            'dept' => 'required',
            'workcenter' => 'required',
            'plant' => 'required',
            'qty' => 'required|numeric',
            'satuan' => 'required',
        ]);
        $data = Iot_Masuk::findOrFail($id);
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
        $data = Iot_Masuk::findOrFail($id);
        $data->delete();
    }
}
