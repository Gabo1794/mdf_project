@extends('admin.admin')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Administración de usuarios</h3>
              <button class="btn btn-info btn-add" data-target="#myModal" data-toggle="modal" type="button">
                <i class="fas fa-user-plus">
                </i>
              </button>          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/>
          <table id="usersRead" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Usuario</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    ×
                </button>
                <h4 class="modal-title" id="title">
                    Crear Usuario
                </h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <input id="id_user" type="hidden" value=""/>
                        {!! Form::label('name', 'Usuario:', ["class"=>"col-sm-2 col-sm-offset-1 control-label"])  !!}
                        <div class="col-sm-8">
                            {!! Form::text('user_name',null, ['class'=>'form-control', 'placeholder'=>'Correo Electronico / Nombre de usuario', 'id'=>'user']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Contraseña:', ["class"=>"col-sm-2 col-sm-offset-1 control-label"])  !!}
                        <div class="col-sm-8">
                            {!! Form::password('userPassword', ['class'=>'form-control', 'placeholder'=>'Contraseña', 'id'=>'password']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Contraseña:', ["class"=>"col-sm-2 col-sm-offset-1 control-label"])  !!}
                        <div class="col-sm-8">
                            {!! Form::password('userPassword', ['class'=>'form-control', 'placeholder'=>'Ingresa de nuevo la contraseña', 'id'=>'password2']) !!}
                        </div>
                    </div>                    
                    <div class="form-group">
                        <input id="id" type="hidden" value=""/>
                        {!! Form::label('name', 'Tipo de Usuario:', ["class"=>"col-sm-3 control-label"])  !!}
                        <div class="col-sm-8">
                        <select class="form-control" id="tipoUsuario">
                        </select>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary m-l-10 m-r-10" id="btnGuardar">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>  
@endsection

@section('scriptMiembros')
    {{ Html::script('personjs/users/users.js') }}
@endsection