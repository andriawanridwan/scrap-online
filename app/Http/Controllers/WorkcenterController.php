<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatable;
use App\Workcenter;
class WorkcenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('option.workcenter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Workcenter();
        return view('option.form_workcenter',compact('model'));
    }

    public function Datatable(){
        $model = Workcenter::query();
        return Datatables()::of($model)
            ->addColumn('action',function($model){
                return view('layouts._action', [
                    'url_edit'  => route('workcenter.edit',$model->id),
                    'url_destroy'   => route('workcenter.destroy',$model->id),
                    'edit_title'    => 'Edit Workcenter',
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
            'workcenter' => 'required',

        ]);
        Workcenter::create($request->all());
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
        $model = Workcenter::findOrFail($id);
        return view('option.form_workcenter',compact('model'));
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
            'workcenter' => 'required',

        ]);
        $data = Workcenter::findOrFail($id);
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
        $data = Workcenter::findOrFail($id);
        $data->delete();
    }
}
