<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisHasilIot;
class JenisHasilIotController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('option.jenishasiliot');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new JenisHasilIot();
        return view('option.form_jenishasiliot',compact('model'));
    }

    public function Datatable(){
        $model = JenisHasilIot::query();
        return Datatables()::of($model)
            ->addColumn('action',function($model){
                return view('layouts._action', [
                    'url_edit'      => route('jenishasiliot.edit',$model->id),
                    'url_destroy'   => route('jenishasiliot.destroy',$model->id),
                    'edit_title'    => 'Edit Jenis Hasil IOT',
                    'big_modal'     => ''
                ]);
            })
            ->editColumn('harga',function($model){
                return 'Rp. '. number_format($model->harga,2,",",".");
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
            'jenis_hasil_iot' => 'required',
            'harga' => 'required',
            'satuan'    => 'required'

        ]);
        $notrp = explode('. ',$request->harga);
      
        $harga = '';
        $pecah = explode('.',$notrp[1]);
        foreach($pecah as $p){
            $harga .= $p;
        }
   
        $req = $request->all();
        $req['harga'] = $harga;
        


        JenisHasilIot::create($req);
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
        $model = JenisHasilIot::findOrFail($id);
        
        return view('option.form_jenishasiliot',compact('model'));
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
            'jenis_hasil_iot' => 'required',
            'harga'     => 'required',
            'satuan'    => 'required'

        ]);
        $data = JenisHasilIot::findOrFail($id);
        $req = $request->all();
        if(!is_numeric($request->harga)){
            $notrp = explode('. ',$request->harga);
            $harga = '';
            $pecah = explode('.',$notrp[1]);
            foreach($pecah as $p){
                $harga .= $p;
            }
            $req['harga'] = $harga;
        }
        $data->update($req);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JenisHasilIot::findOrFail($id);
        $data->delete();
    }
}
