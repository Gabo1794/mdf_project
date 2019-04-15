<?php

namespace mdf\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use mdf\Http\Requests;
use mdf\Http\Requests\LoginRequest;

class LoginController extends Controller
{
  public function __construct(){
    $this->middleware('auth', ['only' => 'admin']);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function admin(){
    return view('admin.admin');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(LoginRequest $request)
  {
      if(Auth::attempt(['usuario' => $request['usuario'], 'password' => $request['password']])){
        return Redirect:: to('controlProductos');
      }
      Session::flash('message-error', 'Datos incorrectos');
      return Redirect::to('/');
  }

  
  public function login(){
    return view('login.form');
 }


  public function logout(){
      Auth::logout();
      //este es un metodo de AUTH igual que user
      return Redirect::to('/');
  }

}
