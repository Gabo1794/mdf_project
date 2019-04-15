@extends('admin.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Miembros de {{ $ministerio->ministerio }}
                </h3>
                <button class="btn btn-info btn-add" data-target="#myModal" data-toggle="modal" type="button">
                    <i class="fas fa-user-plus">
                    </i>
                </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input id="idmrm" name="_mrm" type="hidden" value="{{ $ministerio->id_ministerio }}"/>
                    <table class="table table-bordered table-striped" id="mrmTable">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Miembro
                                </th>
                                <th>
                                    Rol
                                </th>                                
                                <th>
                                    Acciones
                                </th>
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
                    Agregar un miembro al ministerio
                </h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <input id="idmiembro" type="hidden" value=""/>
                        {!! Form::label('name', 'Miembro:', ["class"=>"col-sm-2 col-sm-offset-1 control-label"])  !!}
                        <div class="col-sm-8">
                            {!! Form::text('miembro_name',null, ['class'=>'form-control', 'placeholder'=>'Buscar miembro...', 'id'=>'miembro']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <input id="id" type="hidden" value=""/>
                        {!! Form::label('name', 'Rol:', ["class"=>"col-sm-2 col-sm-offset-1 control-label"])  !!}
                        <div class="col-sm-8">
                        <select class="form-control" id="rol">
                        </select>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary m-l-10 m-r-10" id="CrearMRM">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalEdit" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    ×
                </button>
                <h4 class="modal-title" id="title">
                    Editar un mimebro del ministerio
                </h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <input id="idmiembroEdit" type="hidden" value=""/>
                        <input id="mrmEdit" type="hidden" value=""/>
                        {!! Form::label('name', 'Miembro:', ["class"=>"col-sm-2 col-sm-offset-1 control-label"])  !!}
                        <div class="col-sm-8">
                            {!! Form::text('miembro_name',null, ['class'=>'form-control', 'placeholder'=>'Buscar miembro...', 'id'=>'miembroEdit']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <input id="id" type="hidden" value=""/>
                        {!! Form::label('name', 'Rol:', ["class"=>"col-sm-2 col-sm-offset-1 control-label"])  !!}
                        <div class="col-sm-8">
                        <select class="form-control" id="rolEdit">
                        </select>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning m-l-10 m-r-10" id="EditarMRM">
                    Actualizar
                </button>
                <label class="container col-lg-4 col-lg-3 col-sm-12 col-xs-12">
                    Activo
                    <input id="activoInactivo" type="checkbox"/>
                        <span class="checkmark">
                        </span>
                </label>            
            </div>
        </div>
    </div>
</div>

@endsection

@section('scriptMiembros')
    {{ Html::script('personjs/ministerios/readmrm.js') }}
@endsection