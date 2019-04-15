<?php

namespace mdf\Http\Controllers;

use Illuminate\Http\Request;
use mdf\Ministerios;
use Illuminate\Support\Facades\DB;
use mdf\MRM;

class MinisteriosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ministerios()
    {
        $ministerios = Ministerios::all();
        return response()->json(
            $ministerios->toArray()
        );
    }

    public function index()
    {
        return view('ministerio.index');
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
        if ($request->ajax()) {
            $ministerio             = new Ministerios();
            $ministerio->ministerio = $request->ministerio;
            $ministerio->save();
            return response()->json([
                "mensaje" => "Creado Correctamente",
            ]);
        }
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
        $ministerio = Ministerios::find($id);
        return response()->json(
            $ministerio->toArray()
        );
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
        $ministerio = Ministerios::find($id);
        $ministerio->fill($request->all());
        $ministerio->save();
        return response()->json([
            "mensaje" => "Actualizado Correctamente",
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ministerio = Ministerios::find($id);
        $ministerio->delete();
        //return Redirect::to('/miembros');
        return response()->json([
            "mensaje" => "Eliminado",
        ]);
    }

    public function MiembrosMinisterios($id){
        $ministerio = Ministerios::find($id);
        return view('mrm.index',compact('ministerio'));
    }

    public function getMRM($id){
            $model = new Ministerios();
            $mrm = $model->hydrate(
                DB::select(
                    'call GETMRM('.$id.')'
                )
            ); 
            return response()->json(
                $mrm->toArray()
            );
        
    }

    public function addMRM(Request $request){
        if ($request->ajax()) {
            $mrm = new MRM();
            $mrm->id_miembro = $request->id;
            $mrm->id_rol = $request->rol;
            $mrm->id_ministerio = $request->ministerio;
            $mrm->activo = 'S';
            if($mrm->save()){
                return response()->json([
                    "mensaje" => "Creado Correctamente",
                ]);
            }
            return response()->json([
                "mensaje" => "Error al añadir",
            ]);
        }
    }

    public function updateMRM(Request $request, $id){
        $mrm = MRM::find($id);
        $mrm->fill($request->all());
        if($mrm->save()){
            return response()->json([
                "mensaje" => "Actualizado Correctamente",
            ]);
        }
        return response()->json([
            "mensaje" => "Error al actualizar",
        ]);                
    }
}
