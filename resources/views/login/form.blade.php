@extends('login.login')

@section('content')
@include('alerts.errors')
@include('alerts.request')
<div class="login-box-body">
  <p class="login-box-msg">Iniciar sesión</p>

  {!! Form::open(['route'=>'login.store', 'method'=> 'POST'])!!}
    <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="usuario"/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="password" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
      <!-- /.col -->
      <div class="col-xs-12">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </div>
      <!-- /.col -->
    </div>
  {!! Form::close()!!}
  <!-- <form action="{{ URL('admin') }}">

  </form> -->

</div>

@endsection
