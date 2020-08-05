<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeptSrs;
class DeptSrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        return view('option.deptsrs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new DeptSrs();
        return view('option.form_deptsrs',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Datatable(){
        $model = DeptSrs::query();
        return Datatables()::of($model)
            ->addColumn('action',function($model){
                return view('layouts._action', [
                    'url_edit'      => route('deptsrs.edit',$model->id),
                    'url_destroy'   => route('deptsrs.destroy',$model->id),
                    'edit_title'    => 'Edit Dept SRS',
                    'big_modal'     => ''
                ]);
            })->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'deptsrs' => 'required',

        ]);
        DeptSrs::create($request->all());
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
        $model = DeptSrs::findOrFail($id);
        return view('option.form_deptsrs',compact('model'));
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
            'deptsrs' => 'required',

        ]);
        $data = DeptSrs::findOrFail($id);
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
        $data = DeptSrs::findOrFail($id);
        $data->delete();
    }
}
