
<!-- Campo Nombre-->
<div class="field item form-group">
<label for="nombre" class="col-form-label col-md-3 col-sm-3  label-align">Razón Social<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">		
<input type="text"class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" value="{{ isset($colegio->nombre)?$colegio->nombre:old('nombre')}}">
{!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo Nombre-->

<!-- Campo CUE-->
<div class="field item form-group">
<label for="cue" class="col-form-label col-md-3 col-sm-3  label-align">CUE<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">		
<input type="number" min="0" class="form-control {{$errors->has('cue')?'is-invalid':''}}" name="cue" id="cue" value="{{ isset($colegio->cue)?$colegio->cue:old('cue')}}">
{!! $errors->first('cue','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo cue-->

<!-- Campo codigo-->
<div class="field item form-group">
<label for="codigo" class="col-form-label col-md-3 col-sm-3  label-align">Código<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">		
<input type="number" min="0" class="form-control {{$errors->has('codigo')?'is-invalid':''}}" name="codigo" id="codigo" value="{{ isset($colegio->codigo)?$colegio->codigo:old('codigo')}}">
{!! $errors->first('codigo','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo cue-->


<!-- Campo FechaInicio-->
<div class="field item form-group">
<label for="FechaInicio" class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Inicio<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">		
<input type="date"class="form-control {{$errors->has('FechaInicio')?'is-invalid':''}}" name="FechaInicio" id="FechaInicio" value="{{ isset($colegio->FechaInicio)?$colegio->FechaInicio:old('FechaInicio')}}">
{!! $errors->first('FechaInicio','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo FechaInicio-->


<!-- Campo Cuit-->
<div class="field item form-group">
<label for="cuit" class="col-form-label col-md-3 col-sm-3  label-align">CUIT<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">	
<input type="text" class="form-control {{$errors->has('cuit')?'is-invalid':''}}"name="cuit" id="cuit" value="{{ isset($colegio->cuit)?$colegio->cuit:old('cuit')}}">
{!! $errors->first('cuit','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo Cuit-->


<!-- Campo direccion-->
<div class="field item form-group">
<label for="direccion" class="col-form-label col-md-3 col-sm-3  label-align">Dirección<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">		
<input type="text" class="form-control {{$errors->has('direccion')?'is-invalid':''}}" name="direccion" id="direccion" value="{{ isset($colegio->direccion)?$colegio->direccion:old('direccion')}}">
{!! $errors->first('direccion','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo direccion-->

<!-- Campo numero-->
<div class="field item form-group">
<label for="numero" class="col-form-label col-md-3 col-sm-3  label-align">Altura<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">	
<input type="text" class="form-control {{$errors->has('numero')?'is-invalid':''}}" name="numero" id="numero" value="{{ isset($colegio->numero)?$colegio->numero:old('numero')}}">
{!! $errors->first('numero','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo numero-->

<!-- Campo Telefono-->
<div class="field item form-group">
<label for="telefono" class="col-form-label col-md-3 col-sm-3  label-align">Teléfono<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">	
<input type="text"class="form-control {{$errors->has('telefono')?'is-invalid':''}}" name="telefono" id="telefono" value="{{ isset($colegio->telefono)?$colegio->telefono:old('telefono')}}">
{!! $errors->first('telefono','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo telefono-->


<!-- Campo Correo-->
<div class="field item form-group">
<label for="correo" class="col-form-label col-md-3 col-sm-3  label-align">Correo<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">	
<input type="email" class="form-control {{$errors->has('correo')?'is-invalid':''}}" name="correo" id="correo" value="{{ isset($colegio->correo)?$colegio->correo:old('correo')}}">
{!! $errors->first('correo','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo Correo-->

<!-- Campo web-->
<div class="field item form-group">
<label for="web" class="col-form-label col-md-3 col-sm-3  label-align">Web<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">		
<input type="text" class="form-control {{$errors->has('web')?'is-invalid':''}}" name="web" id="web" value="{{ isset($colegio->web)?$colegio->web:old('web')}}">
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
<input type="file" class="form-control {{$errors->has('foto')?'is-invalid':''}}" name="foto" id="foto" value="">
{!! $errors->first('foto','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>
<!--Fin Campo Foto-->


<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>

			<input type="submit" class="btn btn-success btn-sm" Value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}">
			<a class="btn btn-primary btn-sm" href="{{ url('alumnos')}}">Cancelar</a>

		</div>
	</div>
</div>