<?php

namespace mdf\Http\Controllers;

use Illuminate\Http\Request;
use mdf\Miembros;
use Illuminate\Support\Facades\DB;

class MiembrosController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function lista()
    {
        $miembros = Miembros::all();
        return response()->json(
            $miembros->toArray()
        );
    }

    /*public function getMiembro(Request $valorBusqueda)
    {
        $miembros = Miembros::where('name','LIKE',"%{$valorBusqueda}%");
            return response()->json(
                $miembros->toArray()
            );
        
    } */   

    public function index()
    {
        return view('miembros.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('miembros.create');
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

            $miembro                   = new Miembros();
            $miembro->nombre           = $request->name;
            $miembro->ap_pat           = $request->lastname;
            $miembro->ap_mat           = $request->secondname;
            $miembro->edad             = $request->edad;
            $miembro->fecha_nac        = $request->fechan;
            $miembro->direccion        = $request->direccion;
            $miembro->tel_fijo         = $request->tel;
            $miembro->tel_cel          = $request->cel;
            $miembro->nac_espiritual   = $request->fechae;
            $miembro->consolidacion    = $request->consolidacion;
            $miembro->peniel           = $request->peniel;
            $miembro->bautismo_agua    = $request->bagua;
            $miembro->bautismo_es      = $request->bespiritu;
            $miembro->sanidad_total    = $request->sanidad;
            $miembro->curso1           = $request->curso1;
            $miembro->curso2           = $request->curso2;
            $miembro->curso3           = $request->curso3;
            $miembro->curso4           = $request->curso4;
            $miembro->curso5           = $request->curso5;
            $miembro->curso6           = $request->curso6;
            $miembro->curso7           = $request->curso7;
            $miembro->email            = $request->email;
            $miembro->d07              = $request->d07;
            $miembro->oracion_familias = $request->fam;
            $miembro->observaciones    = $request->observaciones;

            $miembro->save();

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $miembro = Miembros::find($id);
        return view('miembros.edit', ['miembro' => $miembro]);

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
        if ($request->ajax()) {

            /*$miembro = Miembros::find($id);
            $miembro->fill($request->all());
            $miembro->save();

            return response()->json([
            "Mensaje" => "Actualizado"
            ]);*/

            //Miembros::where('id_miembro', $id)->update($request->all());
            /*para que funcione esto el nombre del elemento debe de ser el mismo que el modelo*/
            //return redirect('/miembros');
            $miembro                   = Miembros::find($id);
            $miembro->nombre           = $request->name;
            $miembro->ap_pat           = $request->lastname;
            $miembro->ap_mat           = $request->secondname;
            $miembro->edad             = $request->edad;
            $miembro->fecha_nac        = $request->fechan;
            $miembro->direccion        = $request->direccion;
            $miembro->tel_fijo         = $request->tel;
            $miembro->tel_cel          = $request->cel;
            $miembro->nac_espiritual   = $request->fechae;
            $miembro->consolidacion    = $request->consolidacion;
            $miembro->peniel           = $request->peniel;
            $miembro->bautismo_agua    = $request->bagua;
            $miembro->bautismo_es      = $request->bespiritu;
            $miembro->sanidad_total    = $request->sanidad;
            $miembro->curso1           = $request->curso1;
            $miembro->curso2           = $request->curso2;
            $miembro->curso3           = $request->curso3;
            $miembro->curso4           = $request->curso4;
            $miembro->curso5           = $request->curso5;
            $miembro->curso6           = $request->curso6;
            $miembro->curso7           = $request->curso7;
            $miembro->email            = $request->email;
            $miembro->d07              = $request->d07;
            $miembro->oracion_familias = $request->fam;
            $miembro->observaciones    = $request->observaciones;

            $miembro->save();

            return response()->json([
                "mensaje" => "Actualizado",
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $miembro = Miembros::find($id);
        $miembro->delete();
        //return Redirect::to('/miembros');
        return response()->json([
            "redirect" => "/miembros",
        ]);

    }
}
