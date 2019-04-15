<?php

namespace mdf\Http\Controllers;

use Illuminate\Http\Request;
use mdf\Rol;

class RolController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function roles()
    {
        $rol = Rol::all();
        return response()->json(
            $rol->toArray()
        );
    }

    public function index()
    {
        return view('rol.index');
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
            $rol      = new Rol();
            $rol->rol = $request->rol;
            $rol->save();
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
        $rol = Rol::find($id);
        return response()->json(
            $rol->toArray()
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
        $rol = Rol::find($id);
        $rol->fill($request->all());
        $rol->save();
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
        $rol = Rol::find($id);
        $rol->delete();
        //return Redirect::to('/miembros');
        return response()->json([
            "mensaje" => "Eliminado",
        ]);
    }
}
