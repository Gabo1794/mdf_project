<?php

namespace mdf\Http\Controllers;

use Illuminate\Http\Request;
use mdf\User;
use mdf\TipoUsuario;

class UsuariosController extends Controller
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
        return view('usuarios.index');
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
            $usuario             = new User();
            $usuario->usuario = $request->usuario;
            $usuario->password = bcrypt($request->password);
            $usuario->tipoUser = $request->tipoUser;
            $usuario->save();
            // $ministerio->ministerio = $request->ministerio;
            // $ministerio->save();
            return response()->json([
                "mensaje" => "Creado Correctamente",
            ]);
        }        
    }


    public function getUsers(){
        $user = User::all();
        return response()->json(
            $user->toArray()
        );
    }
    
    public function getTipoUsuario(){
        $tipoUser = TipoUsuario::all();
        return response()->json(
            $tipoUser->toArray()
        );
    }

    public function UpdateUser(Request $request){
        if ($request->ajax()){
            $userEdit = User::find($request->id);
            $userEdit->usuario = $request->usuario;
            if($request->password != ""){
                $userEdit->password = bcrypt($request->password);
            }
            $userEdit->tipoUser = $request->tipoUser;
            $userEdit->save();
            return response()->json([
                "mensaje" => "Editado Correctamente",
            ]);
            
        }
    }
}
