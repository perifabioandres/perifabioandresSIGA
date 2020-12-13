

<div class="field item form-group">
<label for="nombre" class="col-form-label col-md-3 col-sm-3  label-align">Nivel<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" value="{{ isset($nivel->nombre)?$nivel->nombre:old('nombre')}}">
{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
</div> 
</div>

<div class="field item form-group">
<label for="abreviatura" class="col-form-label col-md-3 col-sm-3  label-align">Abreviatura<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input type="text" class="form-control {{$errors->has('abreviatura')?'is-invalid':''}}" name="abreviatura" id="abreviatura" value="{{ isset($nivel->abreviatura)?$nivel->abreviatura:old('abreviatura')}}">
{!! $errors->first('abreviatura','<div class="invalid-feedback">:message</div>') !!}
</div>
</div>

<div class="field item form-group">
<label for="descripcion" class="col-form-label col-md-3 col-sm-3  label-align">Descripión</label>
<div class="col-md-6 col-sm-6">
<input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ isset($nivel->descripcion)?$nivel->descripcion:''}}">
</div>
</div>


<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>
				<input type="submit" class="btn btn-success btn-sm" value="{{ $Modo=='crear'?'Agregar':'Modificar' }}">
				<a href="{{ url('niveles')}}" class="btn btn-primary btn-sm">Regresar</a>
		</div>
	</div>
</div>