@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Alumno</h3>
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


<h4>Datos del alumno: {{isset($alumno->Nombre)?$alumno->Nombre:old('Nombre')}} {{ isset($alumno->Apellido)?$alumno->Apellido:old('Apellido')}}</h4> 
<div class="dropdown-divider"></div>

<form action="{{ url('/alumnos/'.$alumno->id)}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}  

{{ method_field('PATCH')}}

    <!-- Campo Tipo documento-->
   <div class="form-group row">
    <label for="dni_id" class="col-form-label col-md-3 col-sm-3 label-align">Tipo de Documento <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <select class="custom-select {{$errors->has('dni_id')?'is-invalid':''}}" id="dni_id" name="dni_id" disabled="">
                
        @foreach ($documentos as $documento)
           <option value="{{ $documento->id }}" {{$documento->id == $alumno->dni_id ? 'selected' : ''}}> {{ $documento->abreviatura }}</option>
        @endforeach

    </select>
    {!! $errors->first('dni_id','<div class="invalid-feedback">:message</div>')!!}
    </div>
  </div>
    <!--Fin Tipo documento-->




<!-- Campo DNI-->
    <div class="form-group row">
    <label for="dni" class="col-form-label col-md-3 col-sm-3 label-align">Documento Nº <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6"> 
    <input type="text" class="form-control {{$errors->has('dni')?'is-invalid':''}}" name="dni" id="dni" value="{{ isset($alumno->dni)?$alumno->dni:old('dni')}}" disabled="">

    {!! $errors->first('dni','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo DNI-->


<!-- Campo Nombre-->
    <div class="form-group row">
    <label for="Nombre" class="col-form-label col-md-3 col-sm-3 label-align">Nombre <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">     
    <input type="text"class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" name="Nombre" id="Nombre" value="{{ isset($alumno->Nombre)?$alumno->Nombre:old('Nombre')}}" disabled="">
    {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Nombre-->


<!-- Campo Apellido-->
    <div class="form-group row">
    <label for="Apellido" class="col-form-label col-md-3 col-sm-3 label-align">Apellido <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">     
    <input type="text"class="form-control {{$errors->has('Apellido')?'is-invalid':''}}" name="Apellido" id="Apellido" value="{{ isset($alumno->Apellido)?$alumno->Apellido:old('Apellido')}}" disabled="">
    {!! $errors->first('Apellido','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Apellido-->


<!-- Campo Sexo-->
    <div class="form-group row">
    <label for="Sexo" class="col-form-label col-md-3 col-sm-3 label-align">Genero <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">  
    <select id="Sexo" class="custom-select {{$errors->has('Sexo')?'is-invalid':''}}" name="Sexo" id="Sexo" value="{{ isset($alumno->Sexo)?$alumno->Sexo:old('Sexo')}}" disabled="">
      <option value="M">Masculino</option>
      <option value="F">Femenino</option>
      <option value="O">Otro</option>
     </select>
    {!! $errors->first('Sexo','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Sexo-->


<!-- Campo FechaNacimiento-->
    <div class="form-group row">
    <label for="FechaNacimiento" class="col-form-label col-md-3 col-sm-3 label-align">Fecha de Nacimiento <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6"> 
    <input type="date"class="form-control {{$errors->has('FechaNacimiento')?'is-invalid':''}}" name="FechaNacimiento" id="FechaNacimiento" value="{{ isset($alumno->FechaNacimiento)?$alumno->FechaNacimiento:old('FechaNacimiento')}}" disabled="">
    {!! $errors->first('FechaNacimiento','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo FechaNacimiento-->

<!-- Campo Cuil-->
    <div class="form-group row">
    <label for="Cuil" class="col-form-label col-md-3 col-sm-3 label-align">CUIL <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">    
    <input type="text" class="form-control {{$errors->has('Cuil')?'is-invalid':''}}"name="Cuil" id="Cuil" value="{{ isset($alumno->Cuil)?$alumno->Cuil:old('Cuil')}}" data-inputmask="'mask': '99-99999999-9'" disabled="">
    {!! $errors->first('Cuil','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Cuil-->


<!-- Datos Geograficos-->
    <div class="form-group row">
    <label for="pais_id" class="col-form-label col-md-3 col-sm-3 label-align">País <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <select class="custom-select {{$errors->has('pais_id')?'is-invalid':''}}" id="pais_id" name="pais_id" disabled="">
    
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
    <select class="custom-select" id="provincia_id" name="provincia_id" disabled="">
        
        <option value="">Seleccione la provincia</option>

    </select>
    </div>
    </div>

    <div class="form-group row">
    <label for="departamento_id" class="col-form-label col-md-3 col-sm-3 label-align">Departamento <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <select class="custom-select" id="departamento_id" name="departamento_id" disabled="">
                                     
        <option value="">Seleccione el departamento</option>

    </select>
    </div>
    </div>


    <div class="form-group row">
    <label for="localidad_id" class="col-form-label col-md-3 col-sm-3 label-align">Localidad<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <select class="custom-select" id="localidad_id" name="localidad_id" disabled="">
            
        @foreach ($localidades as $loca)
            
            <option value="{{ $loca->id }}" {{$loca->id == $alumno->localidad_id ? 'selected' : ''}}> {{ $loca->nombre }}</option>

        @endforeach


    </select>
    </div>
    </div>


<!--Fin datos geograficos-->

<!-- Campo direccion-->
    <div class="form-group row">
    <label for="direccion" class="col-form-label col-md-3 col-sm-3 label-align">Dirección <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <input type="text"class="form-control {{$errors->has('direccion')?'is-invalid':''}}" name="direccion" id="direccion" value="{{ isset($alumno->direccion)?$alumno->direccion:old('direccion')}}" disabled="">
    {!! $errors->first('direccion','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo direccion-->

<!-- Campo numero-->
    <div class="form-group row">
    <label for="numero" class="col-form-label col-md-3 col-sm-3 label-align">Altura</label>
    <div class="col-md-6 col-sm-6">     
    <input type="text"class="form-control {{$errors->has('numero')?'is-invalid':''}}" name="numero" id="numero" value="{{ isset($alumno->numero)?$alumno->numero:old('numero')}}" disabled="">
    {!! $errors->first('numero','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo numero-->


<!-- Campo Telefono-->
    <div class="form-group row">
    <label for="Telefono" class="col-form-label col-md-3 col-sm-3 label-align">Telefono <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">   
    <input data-inputmask="'mask' : '(999) 999-9999'" type="text"class="form-control {{$errors->has('Telefono')?'is-invalid':''}}" name="Telefono" id="Telefono" value="{{ isset($alumno->Telefono)?$alumno->Telefono:old('Telefono')}}" disabled="">
    {!! $errors->first('Telefono','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Telefono-->


<!-- Campo Correo-->
    <div class="form-group row">
    <label for="Correo" class="col-form-label col-md-3 col-sm-3 label-align">Correo <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6"> 
    <input type="email" class="form-control {{$errors->has('Correo')?'is-invalid':''}}" name="Correo" id="Correo" value="{{ isset($alumno->Correo)?$alumno->Correo:old('Correo')}}" disabled="">
    {!! $errors->first('Correo','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Correo-->


<!-- Campo Foto-->
    <div class="form-group row">
    <label for="Foto" class="col-form-label col-md-3 col-sm-3 label-align">Foto <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">     
    @if(isset($alumno->Foto))
    <br/>
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$alumno->Foto}}" alt="" width="100">
    <br/>
    @endif

    <input type="file" class="form-control {{$errors->has('Foto')?'is-invalid':''}}" name="Foto" id="Foto" value="" disabled="">
    {!! $errors->first('Foto','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Foto-->

<div class="field item form-group">
<label for="horaHasta"class="col-form-label col-md-3 col-sm-3  label-align">Activo<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input type="checkbox" class="js-switch" unchecked name="activo" id="activo" value="{{ isset($alumno->activo)?$alumno->activo:old('activo')}}" disabled=""> 
</label>
</div>
</div>


<!-- Botones-->
<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
          <br/>
            <a class="btn btn-warning btn-sm" href="{{ url('/alumnos/'.$alumno->id.'/edit') }}">Editar</a>

            <a class="btn btn-primary btn-sm" href="{{ url('alumnos')}}">Regresar</a>
      </div>
    </div>
</div>
<!-- Botones-->
</div>

</form>

<script>
	$(document).ready(function($){
		//alert("Texto a mostrar");
		$("#Cuil").mask("99-99999999-9");
		$("#Telefono").mask("9999-999999");
	});
</script>



</div><!--Fin del div conteiner-->
  

              
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
<!-- /page content -->

@include('contenedor.footer')    