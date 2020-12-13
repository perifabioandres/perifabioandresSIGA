@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Actualizar Datos Institucionales</h3>
        </div>
      
    </div>

    <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_content">

<div class="container">

<!-- Campo Nombre-->
<div class="field item form-group">
<label for="nombre" class="col-form-label col-md-3 col-sm-3  label-align">Razón Social<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">	
<input type="text"class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" value="{{ isset($colegio->nombre)?$colegio->nombre:old('nombre')}}" disabled="">
{!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo Nombre-->

<!-- Campo CUE-->
<div class="field item form-group">
<label for="cue" class="col-form-label col-md-3 col-sm-3  label-align">CUE<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">	
<input type="number" min="0" class="form-control {{$errors->has('cue')?'is-invalid':''}}" name="cue" id="cue" value="{{ isset($colegio->cue)?$colegio->cue:old('cue')}}" disabled="">
{!! $errors->first('cue','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo cue-->

<!-- Campo codigo-->
<div class="field item form-group">
<label for="codigo" class="col-form-label col-md-3 col-sm-3  label-align">Código<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">		
<input type="number" min="0" class="form-control {{$errors->has('codigo')?'is-invalid':''}}" name="codigo" id="codigo" value="{{ isset($colegio->codigo)?$colegio->codigo:old('codigo')}}" disabled="">
{!! $errors->first('codigo','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo cue-->

<!-- Campo FechaInicio-->
<div class="field item form-group">
<label for="FechaInicio" class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Inicio<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">	
<input type="date"class="form-control {{$errors->has('FechaInicio')?'is-invalid':''}}" name="FechaInicio" id="FechaInicio" value="{{ isset($colegio->FechaInicio)?$colegio->FechaInicio:old('FechaInicio')}}" disabled="">
{!! $errors->first('FechaInicio','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo FechaInicio-->


<!-- Campo Cuit-->
<div class="field item form-group">
<label for="cuit" class="col-form-label col-md-3 col-sm-3  label-align">CUIT<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">	
<input type="text" class="form-control {{$errors->has('cuit')?'is-invalid':''}}"name="cuit" id="cuit" value="{{ isset($colegio->cuit)?$colegio->cuit:old('cuit')}}" disabled="">
{!! $errors->first('cuit','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo Cuit-->


<!-- Campo direccion-->
<div class="field item form-group">
<label for="direccion" class="col-form-label col-md-3 col-sm-3  label-align">Dirección<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">		
<input type="text" class="form-control {{$errors->has('direccion')?'is-invalid':''}}" name="direccion" id="direccion" value="{{ isset($colegio->direccion)?$colegio->direccion:old('direccion')}}" disabled="">
{!! $errors->first('direccion','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo direccion-->

<!-- Campo numero-->
<div class="field item form-group">
<label for="numero" class="col-form-label col-md-3 col-sm-3  label-align">Altura<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">		
<input type="text" class="form-control {{$errors->has('numero')?'is-invalid':''}}" name="numero" id="numero" value="{{ isset($colegio->numero)?$colegio->numero:old('numero')}}" disabled="">
{!! $errors->first('numero','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo numero-->

<!-- Campo Telefono-->
<div class="field item form-group">
<label for="telefono" class="col-form-label col-md-3 col-sm-3  label-align">Teléfono<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">		
<input type="text"class="form-control {{$errors->has('telefono')?'is-invalid':''}}" name="telefono" id="telefono" value="{{ isset($colegio->telefono)?$colegio->telefono:old('telefono')}}" disabled="">
{!! $errors->first('telefono','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo telefono-->


<!-- Campo Correo-->
<div class="field item form-group">
<label for="correo" class="col-form-label col-md-3 col-sm-3  label-align">Correo<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">	
<input type="email" class="form-control {{$errors->has('correo')?'is-invalid':''}}" name="correo" id="correo" value="{{ isset($colegio->correo)?$colegio->correo:old('correo')}}" disabled="">
{!! $errors->first('correo','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo Correo-->

<!-- Campo web-->
<div class="field item form-group">
<label for="web" class="col-form-label col-md-3 col-sm-3  label-align">Web<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">		
<input type="text" class="form-control {{$errors->has('web')?'is-invalid':''}}" name="web" id="web" value="{{ isset($colegio->web)?$colegio->web:old('web')}}" disabled="">
{!! $errors->first('web','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo web-->


<!-- Campo Foto-->
<div class="field item form-group">
<label for="foto" class="col-form-label col-md-3 col-sm-3  label-align">Logo<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">	
@if(isset($colegio->foto))
<br/>
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$colegio->foto}}" alt="" width="100">
<br/>
@endif
</div>
</div>
<!--Fin Campo Foto-->


<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>
			<a class="btn btn-warning btn-sm" href="{{ url('/colegios/'.$colegio->id.'/edit') }}">Editar</a>
			<a class="btn btn-primary btn-sm" href="{{ url('alumnos')}}">Cancelar</a>
		</div>
	</div>
</div>
</div>
               
              
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
<!-- /page content -->

@include('contenedor.footer')    



