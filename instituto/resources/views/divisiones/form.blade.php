

<div class="field item form-group">
<label for="nombre" class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control {{$errors->has('nombre')?'is-invalid':''}}" type="text" name="nombre" id="nombre" value="{{ isset($division->nombre)?$division->nombre:old('nombre')}}">
{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>

<div class="field item form-group">
<label for="abreviatura" class="col-form-label col-md-3 col-sm-3  label-align">Abreviatura<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control {{$errors->has('abreviatura')?'is-invalid':''}}" type="text" name="abreviatura" id="abreviatura" value="{{ isset($division->abreviatura)?$division->abreviatura:old('abreviatura')}}">
{!! $errors->first('abreviatura','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>


<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>
			<input type="submit" class="btn btn-success btn-sm" value="{{ $Modo=='crear'?'Agregar':'Modificar'}}">
			<a href="{{ url('divisiones')}}" class="btn btn-primary btn-sm">Regresar</a>
		</div>
	</div>
</div>