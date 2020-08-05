<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TujuanSrs;
class TujuanSrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {
        return view('option.tujuansrs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new TujuanSrs();
        return view('option.form_tujuansrs',compact('model'));
    }

    public function Datatable(){
        $model = TujuanSrs::query();
        return Datatables()::of($model)
            ->addColumn('action',function($model){
                return view('layouts._action', [
                    'url_edit'      => route('tujuansrs.edit',$model->id),
                    'url_destroy'   => route('tujuansrs.destroy',$model->id),
                    'edit_title'    => 'Edit Tujuan IOT',
                    'big_modal'     => ''
                ]);
            })->addIndexColumn()
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
            'tujuan_srs' => 'required',

        ]);
        TujuanSrs::create($request->all());
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
        $model = TujuanSrs::findOrFail($id);
        return view('option.form_tujuansrs',compact('model'));
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
            'tujuan_srs' => 'required',

        ]);
        $data = TujuanSrs::findOrFail($id);
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
        $data = TujuanSrs::findOrFail($id);
        $data->delete();
    }
}
