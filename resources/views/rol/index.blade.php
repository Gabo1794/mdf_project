@extends('admin.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Rol Mundo de Fe
                </h3>
                <button class="btn btn-info btn-add" data-target="#myModal" data-toggle="modal" type="button">
                    <i class="fas fa-user-plus">
                    </i>
                </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                    <table class="table table-bordered table-striped" id="rolTable">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Rol
                                </th>
                                <th>
                                    Opciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </input>
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
                    Agregar Rol
                </h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <input id="id" type="hidden" value=""/>
                        {!! Form::label('name', 'Rol:', ["class"=>"col-sm-2 col-sm-offset-1 control-label"])  !!}
                        <div class="col-sm-8">
                            {!! Form::text('rol_name',null, ['class'=>'form-control', 'placeholder'=>'Rol', 'id'=>'rol']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary m-l-10 m-r-10" data-editar="CrearMinisterio" onclick="AddRol();">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptMiembros')
    {{ Html::script('personjs/rol/readrol.js') }}
@endsection
