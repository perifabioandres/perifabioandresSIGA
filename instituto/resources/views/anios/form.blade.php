

<div class="field item form-group">
<label for="nombre" class="col-form-label col-md-3 col-sm-3  label-align">Año<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control {{$errors->has('nombre')?'is-invalid':''}}" type="number" name="nombre" id="nombre" value="{{ isset($ano->nombre)?$ano->nombre:old('nombre')}}">
{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>

<div class="field item form-group">
<label for="horaDesde"class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Inicio<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control" type="date" name="fechaInicio" id="fechaInicio" value="{{ isset($ano->fechaInicio)?$ano->fechaInicio:old('fechaInicio')}}">
{!! $errors->first('fechaInicio','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>


<div class="field item form-group">
<label for="horaHasta"class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Fin<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control" type="date" name="fechaFin" id="fechaFin" value="{{ isset($ano->fechaFin)?$ano->fechaFin:old('fechaFin')}}">
{!! $errors->first('fechaFin','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>


<div class="field item form-group">
<label for="activo"class="col-form-label col-md-3 col-sm-3  label-align">Activo</label>
<div class="col-md-6 col-sm-6">
<input type="checkbox" name="activo" class="js-switch"> 
</label>
</div>
</div>


<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>
			<input type="submit" class="btn btn-success btn-sm" value="{{ $Modo=='crear'?'Agregar':'Modificar'}}">
			<a href="{{ url('anios')}}" class="btn btn-primary btn-sm">Regresar</a>
		</div>
	</div>
</div>
