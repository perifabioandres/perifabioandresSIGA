
<div class="field item form-group">

<label for="nombre" class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" value="{{ isset($normativa->nombre)?$normativa->nombre:old('nombre')}}">

{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}

</div>
</div>

<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>

		<input type="submit" class="btn btn-success btn-sm" value="{{ $Modo=='crear' ? 'Agregar':'Modificar'}}">
		<a class="btn btn-primary btn-sm" href="{{ url('normativas') }}">Regresar</a>
		</div>
	</div>
</div>
