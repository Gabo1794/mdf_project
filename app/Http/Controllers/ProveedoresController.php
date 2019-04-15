<?php

namespace mdf\Http\Controllers;

use Illuminate\Http\Request;
use mdf\TipoPago;
use mdf\Proveedores;
use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('proveedores.index');
    }

    public function tipoPago(Request $request){
        if($request->ajax()){
            $tipoPago = TipoPago::all();
            return response()->json(
                $tipoPago->toArray()
            );
        }
    }

    public function provedorTipoPago(Request $request){
        if($request->ajax()){
            $model = new Proveedores();
            $proveedor = $model->hydrate(
                DB::select(
                    'call GetProveedorTipoPago()'
                )
            ); 
            return response()->json(
                $proveedor->toArray()
            );
        }
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
    public function store(Request $request)
    {
        //
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
