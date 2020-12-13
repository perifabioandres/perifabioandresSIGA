@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Editar Tutor</h3>
        </div>
      
    </div>

    <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_content">

<div class="container">

@if (count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>
@endif

<div class="">
    <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos del tutor: {{isset($tutor->dni)?$tutor->dni:old('dni')}} - {{isset($tutor->nombre)?$tutor->nombre:old('nombre')}} {{ isset($tutor->apellido)?$tutor->apellido:old('apellido')}}</h2>   
                 <div class="clearfix"></div>
                  </div>


<form action="{{ url('/tutores/'.$tutor->persona_id)}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}  

{{ method_field('PATCH')}}

    <!-- Campo Tipo documento-->
   <div class="form-group row">
    <label for="dni_id" class="col-form-label col-md-3 col-sm-3 label-align">Tipo de Documento <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <select class="custom-select {{$errors->has('dni_id')?'is-invalid':''}}" id="dni_id" name="dni_id">
                
        @foreach ($documentos as $documento)
           <option value="{{ $documento->id }}" {{$documento->id == $tutor->dni_id ? 'selected' : ''}}> {{ $documento->abreviatura }}</option>
        @endforeach

    </select>
    {!! $errors->first('dni_id','<div class="invalid-feedback">:message</div>')!!}
    </div>
  </div>
    <!--Fin Tipo documento-->

<?php //dd($alumno); ?>
<!-- Campo DNI-->
    <div class="form-group row">
    <label for="dni" class="col-form-label col-md-3 col-sm-3 label-align">Documento Nº <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6"> 
    <input type="text" class="form-control {{$errors->has('dni')?'is-invalid':''}}" name="dni" id="dni" value="{{ isset($tutor->dni)?$tutor->dni:old('dni')}}">

    {!! $errors->first('dni','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo DNI-->


<!-- Campo Nombre-->
    <div class="form-group row">
    <label for="nombre" class="col-form-label col-md-3 col-sm-3 label-align">Nombre <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">     
    <input type="text"class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" value="{{ isset($tutor->nombre)?$tutor->nombre:old('nombre')}}">
    {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Nombre-->


<!-- Campo Apellido-->
    <div class="form-group row">
    <label for="apellido" class="col-form-label col-md-3 col-sm-3 label-align">Apellido <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">     
    <input type="text"class="form-control {{$errors->has('apellido')?'is-invalid':''}}" name="apellido" id="apellido" value="{{ isset($tutor->apellido)?$tutor->apellido:old('apellido')}}">
    {!! $errors->first('apellido','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Apellido-->


<!-- Campo Sexo-->
    <div class="form-group row">
    <label for="sexo" class="col-form-label col-md-3 col-sm-3 label-align">Genero <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">  
    <select id="sexo" class="custom-select {{$errors->has('sexo')?'is-invalid':''}}" name="sexo"  value="{{ isset($tutor->sexo)?$tutor->sexo:old('sexo')}}">
      
        <option value="{{ $tutor->sexo}}" {{$tutor->id == $tutor->sexo ? 'selected' : ''}}> {{ $tutor->sexo }}</option>
      <option value="Masculino">Masculino</option>
      <option value="Femenino">Femenino</option>
      <option value="Otro">Otro</option>
     </select>
    {!! $errors->first('sexo','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Sexo-->


<!-- Campo FechaNacimiento-->
    <div class="form-group row">
    <label for="fechanacimiento" class="col-form-label col-md-3 col-sm-3 label-align">Fecha de Nacimiento <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6"> 
    <input type="date"class="form-control {{$errors->has('fechanacimiento')?'is-invalid':''}}" name="fechanacimiento" id="fechanacimiento" value="{{ isset($tutor->fechanacimiento)?$tutor->fechanacimiento:old('fechanacimiento')}}">
    {!! $errors->first('fechanacimiento','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo FechaNacimiento-->

<!-- Campo Cuil-->
    <div class="form-group row">
    <label for="cuil" class="col-form-label col-md-3 col-sm-3 label-align">CUIL <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">    
    <input type="text" class="form-control {{$errors->has('cuil')?'is-invalid':''}}"name="cuil" id="cuil" value="{{ isset($tutor->cuil)?$tutor->cuil:old('cuil')}}" data-inputmask="'mask': '99-99999999-9'">
    {!! $errors->first('cuil','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Cuil-->


<!-- Datos Geograficos-->
    <div class="form-group row">
    <label for="pais_id" class="col-form-label col-md-3 col-sm-3 label-align">País <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <select class="custom-select {{$errors->has('pais_id')?'is-invalid':''}}" id="pais_id" name="pais_id">
    
    @foreach ($paises as $pais)
        <option value="{{ $pais->id }}"> {{ $pais->Nombre }}</option>

    @endforeach

    </select>
    {!! $errors->first('pais_id','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>


    <div class="form-group row">
    <label for="provincia_id" class="col-form-label col-md-3 col-sm-3 label-align">Provincia <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <select class="custom-select" id="provincia_id" name="provincia_id">
        
        <option value="">Seleccione la provincia</option>

    </select>
    </div>
    </div>

    <div class="form-group row">
    <label for="departamento_id" class="col-form-label col-md-3 col-sm-3 label-align">Departamento <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <select class="custom-select" id="departamento_id" name="departamento_id">
                                     
        <option value="">Seleccione el departamento</option>

    </select>
    </div>
    </div>


    <div class="form-group row">
    <label for="localidad_id" class="col-form-label col-md-3 col-sm-3 label-align">Localidad<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <select class="custom-select" id="localidad_id" name="localidad_id">
            
        @foreach ($localidades as $loca)
            
            <option value="{{ $loca->id }}" {{$loca->id == $tutor->localidad_id ? 'selected' : ''}}> {{ $loca->nombre }}</option>

        @endforeach


    </select>
    </div>
    </div>


<!--Fin datos geograficos-->

<!-- Campo direccion-->
    <div class="form-group row">
    <label for="direccion" class="col-form-label col-md-3 col-sm-3 label-align">Dirección <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <input type="text"class="form-control {{$errors->has('direccion')?'is-invalid':''}}" name="direccion" id="direccion" value="{{ isset($tutor->direccion)?$tutor->direccion:old('direccion')}}">
    {!! $errors->first('direccion','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo direccion-->

<!-- Campo numero-->
    <div class="form-group row">
    <label for="numero" class="col-form-label col-md-3 col-sm-3 label-align">Altura</label>
    <div class="col-md-6 col-sm-6">     
    <input type="text"class="form-control {{$errors->has('numero')?'is-invalid':''}}" name="numero" id="numero" value="{{ isset($tutor->numero)?$tutor->numero:old('numero')}}">
    {!! $errors->first('numero','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo numero-->


<!-- Campo Telefono-->
    <div class="form-group row">
    <label for="telefono" class="col-form-label col-md-3 col-sm-3 label-align">Telefono <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">   
    <input data-inputmask="'mask' : '(999) 999-9999'" type="text"class="form-control {{$errors->has('telefono')?'is-invalid':''}}" name="telefono" id="telefono" value="{{ isset($tutor->telefono)?$tutor->telefono:old('telefono')}}">
    {!! $errors->first('telefono','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Telefono-->


<!-- Campo Correo-->
    <div class="form-group row">
    <label for="correo" class="col-form-label col-md-3 col-sm-3 label-align">Correo <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6"> 
    <input type="email" class="form-control {{$errors->has('correo')?'is-invalid':''}}" name="correo" id="correo" value="{{ isset($tutor->correo)?$tutor->correo:old('correo')}}">
    {!! $errors->first('correo','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Correo-->

<div class="form-group row">
    <label for="ocupacion_id" class="col-form-label col-md-3 col-sm-3 label-align">Ocupación<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <select class="custom-select" id="ocupacion_id" name="ocupacion_id">
            
        @foreach ($ocupaciones as $ocupacion)
            
            <option value="{{ $ocupacion->id }}" {{$ocupacion->id == $tutor->ocupacion_id ? 'selected' : ''}}> {{ $ocupacion->nombre }}</option>

        @endforeach


    </select>
    </div>
    </div>



<div class="field item form-group">
<label for="activo"class="col-form-label col-md-3 col-sm-3  label-align">Activo<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input type="checkbox" class="js-switch" unchecked name="activo" id="activo" value="{{ isset($tutor->activo)?$tutor->activo:old('activo')}}"> 
</label>
</div>
</div>



<!-- Botones-->
<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
          <br/>
            <input type="submit" class="btn btn-success" Value="Modificar">

            <a class="btn btn-primary" href="{{ url('tutores')}}">Regresar</a>

        </div>
    </div>
</div>
<!-- Botones-->

</form>


</div><!--Fin del div conteiner-->
  

              
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
<!-- /page content -->
</div>
</div>
</div>


@include('contenedor.footer')   