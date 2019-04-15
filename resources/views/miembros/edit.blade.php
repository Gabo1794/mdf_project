@extends('admin.admin')

@section('content')
<div class="row">
  <div class="col-lg-10 col-lg-offset-1">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Miembros MDF</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

      {!! Form::model($miembro,['route'=>['miembros.update',$miembro->id_miembro], 'method'=>'PUT', 'class'=>'form-horizontal']) !!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      {!! Form::hidden('updateid', $miembro->id_miembro, ['id'=>'idMiembro']) !!}
      <div class="box-body">

        <div class="form-group">

          {!! Form::label('name', 'Nombre:', ["class"=>"col-sm-1 col-sm-offset-1 control-label"])  !!}

            <div class="col-sm-3">

              {!! Form::text('nombre',null, ['class'=>'form-control', 'placeholder'=>'Nombre(s)', 'id'=>'nombre']) !!}

            </div>

            <div class="col-sm-3">

              {!! Form::text('ap_pat',null, ['class'=>'form-control', 'placeholder'=>'Apellido Paterno', 'id'=>'app']) !!}
             
            </div>

            <div class="col-sm-3">
              
              {!! Form::text('ap_mat',null, ['class'=>'form-control', 'placeholder'=>'Apellido Materno', 'id'=>'apm']) !!}
            
            </div>          
        </div>

        <hr>

        <div class="form-group">

          {!! Form::label('name', 'Direccion:', ["class"=>"col-sm-1 col-sm-offset-1 control-label"])  !!}

            <div class="col-sm-9">
              {!! Form::text('direccion',null, ['class'=>'form-control', 'placeholder'=>'Dirección', 'id'=>'direccion']) !!}
            </div>          
        </div>

        <div class="form-group">
            {!! Form::label('name', 'Telefonos:', ["class"=>"col-sm-1 col-sm-offset-1 control-label"])  !!}

            <div class="col-sm-3 col-sm-offset-1">

              {!! Form::text('tel_fijo',null, ['class'=>'form-control', 'placeholder'=>'Telefono de casa', 'id'=>'tel_fijo']) !!}

            </div>

            <div class="col-sm-3 col-sm-offset-1">

              {!! Form::text('tel_cel',null, ['class'=>'form-control', 'placeholder'=>'Telefono Celular', 'id'=>'tel_cel']) !!}
             
            </div>          
        </div>
        <hr>

        <div class="form-group">
          
          {!! Form::label('edad', 'Edad:', ["class"=>"col-sm-1 col-sm-offset-1 control-label"])  !!}

            <div class="col-sm-2">
              {!! Form::text('edad',null, ['class'=>'form-control', 'placeholder'=>'Edad', 'id'=>'edad']) !!}
            </div>

          {!! Form::label('fechaN', 'Fecha de Nacimiento:', ["class"=>"col-sm-3 control-label"])  !!}

            <div class="input-group col-sm-3">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>

              {!! Form::text('fecha_nac',null, ['class'=>'form-control', 'data-mask'=>'""', 'data-inputmask'=>"'alias': 'yyyy-mm-dd'", 'id'=>'fecha_nac']) !!}
            </div>          
        </div>

        <hr>

        <div class="form-group">

          {!! Form::label('fechaNE', 'Fecha de Nacimiento Espiritual:', ["class"=>"col-sm-4 col-sm-offset-2 control-label"])  !!}         
        
            <div class="input-group col-sm-3">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              {!! Form::text('nac_espiritual',null, ['class'=>'form-control', 'data-mask'=>'""', 'data-inputmask'=>"'alias': 'yyyy-mm-dd'", 'id'=>'fecha_esp']) !!}            
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('mail', 'Email:', ['class'=>'col-sm-2 control-label'])  !!}
            <div class="col-sm-9">
              {!! Form::text('email',null, ['class'=>'form-control', 'placeholder'=>'Email', 'id'=>'correo']) !!}
            </div>  
          
        </div>      
        <hr>

        <!--Checkbox-->

        <div class="form-group">
            <div class="col-sm-12 col-sm-offset-3">
                <label class="col-sm-4 control-label">Crecimiento Espiritual</label>
            </div>

            <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12 m-t-15">
              <label class="container col-lg-4 col-lg-3 col-sm-12 col-xs-12">Consolidación
              	@if($miembro->consolidacion == 1)

              		<input id="consolidacion" type="checkbox" checked="checked" value="1">
              	
              	@else

                	<input id="consolidacion" type="checkbox" value="0">
                @endif
                <span class="checkmark"></span>
              </label>

              <label class="container col-lg-4 col-lg-3 col-sm-12 col-xs-12">Peniel
              	@if($miembro->peniel == 1)
              		<input id="peniel" type="checkbox" checked="checked" value="1">
              	@else
              		<input id="peniel" type="checkbox" value="0">
              	@endif
                <span class="checkmark"></span>
              </label>

              <label class="container col-lg-4 col-lg-3 col-sm-12 col-xs-12">Bautizmo en agua
              	@if($miembro->bautismo_agua == 1)
              		<input id="b_agua" type="checkbox" checked="checked" value="1">
              	@else
              		<input id="b_agua" type="checkbox" value="0">
              	@endif              	
                <span class="checkmark"></span>
              </label>                              
              
              <label class="container col-lg-4 col-lg-3 col-sm-12 col-xs-12">Bautizmo en el Espiritu
              	@if($miembro->bautismo_es == 1)
              		<input id="b_espiritu" type="checkbox" checked="checked" value="1">
              	@else
              		<input id="b_espiritu" type="checkbox" value="0">
              	@endif              	
                <span class="checkmark"></span>
              </label>

              <label class="container col-lg-4 col-lg-3 col-sm-12 col-xs-12">Sanidad Total
              	@if($miembro->sanidad_total == 1)
              		<input id="sanidad_total" type="checkbox" value="1" checked="checked">
              	@else
              		<input id="sanidad_total" type="checkbox" value="0">
              	@endif
                <span class="checkmark"></span>
              </label>

              <label class="container col-lg-4 col-lg-3 col-sm-12 col-xs-12">D07
              	@if($miembro->d07 == 1)
              		<input id="d07" type="checkbox" checked="checked" value="1">
              	@else
              		<input id="d07" type="checkbox" value="0">
              	@endif
                <span class="checkmark"></span>
              </label>

              <label class="container col-lg-4 col-lg-3 col-sm-12 col-xs-12">Familias en Oración
              	@if($miembro->oracion_familias == 1)
              		<input id="fam" type="checkbox" value="1" checked="checked">
              	@else
              		<input id="fam" type="checkbox" value="0">
              	@endif              	
                <input id="fam" type="checkbox">
                <span class="checkmark"></span>
              </label>                                                             
            </div>
           
       
        <hr>

        <div class="form-group">
            <div class="col-sm-12 col-sm-offset-3">
                <label class="col-sm-4 control-label">Escuela de liderazgo</label>
            </div>
            <hr>

            {!! Form::label('1', 'Curso 1:', ['class'=>'col-sm-2 control-label'])  !!}
            <div class="col-sm-9">
              {!! Form::text('curso1',null, ['class'=>'form-control', 'placeholder'=>'Nombre del Maestro', 'id'=>'curso1']) !!}
            </div>             
        </div>

        <div class="form-group">
            {!! Form::label('2', 'Curso 2:', ['class'=>'col-sm-2 control-label'])  !!}
            <div class="col-sm-9">
              {!! Form::text('curso2',null, ['class'=>'form-control', 'placeholder'=>'Nombre del Maestro', 'id'=>'curso2']) !!}
            </div>             
        </div>

        <div class="form-group">
            {!! Form::label('3', 'Curso 3:', ['class'=>'col-sm-2 control-label'])  !!}
            <div class="col-sm-9">
              {!! Form::text('curso3',null, ['class'=>'form-control', 'placeholder'=>'Nombre del Maestro', 'id'=>'curso3']) !!}
            </div>             
        </div>

        <div class="form-group">
            {!! Form::label('4', 'Curso 4:', ['class'=>'col-sm-2 control-label'])  !!}
            <div class="col-sm-9">
              {!! Form::text('curso4',null, ['class'=>'form-control', 'placeholder'=>'Nombre del Maestro', 'id'=>'curso4']) !!}
            </div>             
        </div>

        <div class="form-group">
            {!! Form::label('5', 'Curso 5:', ['class'=>'col-sm-2 control-label'])  !!}
            <div class="col-sm-9">
              {!! Form::text('curso5',null, ['class'=>'form-control', 'placeholder'=>'Nombre del Maestro', 'id'=>'curso5']) !!}
            </div>             
        </div>

        <div class="form-group">
            {!! Form::label('6', 'Curso 6:', ['class'=>'col-sm-2 control-label'])  !!}
            <div class="col-sm-9">
              {!! Form::text('curso6',null, ['class'=>'form-control', 'placeholder'=>'Nombre del Maestro', 'id'=>'curso6']) !!}
            </div>             
        </div>

        <div class="form-group">
            {!! Form::label('7', 'Curso 7:', ['class'=>'col-sm-2 control-label'])  !!}
            <div class="col-sm-9">
              {!! Form::text('curso7',null, ['class'=>'form-control', 'placeholder'=>'Nombre del Maestro', 'id'=>'curso7']) !!}
            </div>             
        </div>

        <hr>

        <div class="form-group">
            <div class="col-sm-12">
              <div class="box-body pad">
				{!! Form::textarea('observaciones', null, ['id'=>'observaciones','class'=>'textarea observaciones','placeholder'=>'Observaciones...']) !!}                     
              </div>
            </div>          
        </div>                                        
        
      </div>
        <div class="box-footer">
          <!--<button type="submit" class="btn btn-info pull-right" onclick="ObtenerDatos();">Registrar</button>-->
          <!--<a class="btn btn-info pull-right" onclick="ObtenerDatos();">Registrar</a>-->
          {!! link_to('#', $title = 'Actualizar', $attributes = ['id'=>'actualizar', 'class'=>'btn btn-info pull-right'], $secure = null) !!}
        </div>
      {!! Form::close() !!}

    </div>
  </div>
</div>
@endsection

@section('scriptMiembros')
    {{ Html::script('personjs/editmiembros.js') }}
@endsection