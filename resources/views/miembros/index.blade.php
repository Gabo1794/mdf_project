@extends('admin.admin')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Miembros Mundo de Fe</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
          <table id="miembrosTable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido Paterno</th>
              <th>Email</th>
              <th>Edad</th>
              <th>Operaciones</th>
            </tr>
            </thead>
            <tbody id="datos">

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
@endsection

@section('scriptMiembros')
    {{ Html::script('personjs/rmiembros.js') }}
@endsection