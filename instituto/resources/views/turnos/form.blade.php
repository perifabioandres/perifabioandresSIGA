<div class="field item form-group">
<label for="nombre" class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control {{$errors->has('nombre')?'is-invalid':''}}" type="text" name="nombre" id="nombre" value="{{ isset($turno->nombre)?$turno->nombre:old('nombre')}}">
{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>

<div class="field item form-group">
<label for="abreviatura" class="col-form-label col-md-3 col-sm-3  label-align">Abreviatura<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control {{$errors->has('abreviatura')?'is-invalid':''}}" type="text" name="abreviatura" id="abreviatura" value="{{ isset($turno->abreviatura)?$turno->abreviatura:old('abreviatura')}}">
{!! $errors->first('abreviatura','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>


<div class="field item form-group">
<label for="horaDesde"class="col-form-label col-md-3 col-sm-3  label-align">Hora Desde<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control" type="time" name="horaDesde" id="horaDesde" value="{{ isset($turno->horaDesde)?$turno->horaDesde:old('horaDesde')}}">
</div>
</div>


<div class="field item form-group">
<label for="horaHasta"class="col-form-label col-md-3 col-sm-3  label-align">Hora Hasta<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control" type="time" name="horaHasta" id="horaHasta" value="{{ isset($turno->horaHasta)?$turno->horaHasta:old('horaHasta')}}">
</div>
</div>


<div class="field item form-group">
<label for="descripcion"class="col-form-label col-md-3 col-sm-3  label-align">Descripción</label>
<div class="col-md-6 col-sm-6">
<input class="form-control" type="text" name="descripcion" id="descripcion" value="{{ isset($turno->descripcion)?$turno->descripcion:old('descripcion')}}">
</div>
</div>


<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>
				<input type="submit" class="btn btn-success btn-sm" value="{{ $Modo=='crear'?'Agregar':'Modificar'}}">
				<a href="{{ url('turnos')}}" class="btn btn-primary btn-sm">Regresar</a>
		</div>
	</div>
</div>