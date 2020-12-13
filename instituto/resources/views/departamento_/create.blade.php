@include('contenedor.header')

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Agregar Departamento</h3>
        </div>
      
    </div>

    <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_content">
                      
<div class="container">

@if(count($errors)>0)
	<div class="alert alert-danger" role="alert">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error}}</li>
			@endforeach

		</ul>
	
	</div>

@endif

<form action="{{ url('/departamentos')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
{{ csrf_field() }}

<div class="field item form-group">
<label for="pais_id" class="col-form-label col-md-3 col-sm-3  label-align">País<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select class="form-control {{$errors->has('pais_id')?'is-invalid':''}}" id="pais_id" name="pais_id">
	
	<option value="0" disabled="true" selected="true">Seleccione el pais</option>
	@foreach ($paises as $pais)
		<option value="{{ $pais->id }}"> {{ $pais->nombre }}</option>
	@endforeach

</select>
{!! $errors->first('pais_id','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>

<div class="field item form-group">
<label for="provincia_id" class="col-form-label col-md-3 col-sm-3  label-align">Provincia<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select class="form-control" id="provincia_id" name="provincia_id">
	
	<option value="">Seleccione la provincia</option>

</select>
</div>

</div>

<div class="field item form-group">
<label for="nombre" class="col-form-label col-md-3 col-sm-3  label-align">Departamento<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" value="{{isset($departamento->nombre)?$departamento->nombre:old('nombre')}}">
{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>')!!}
</div>
</div>


<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>
			<input class="btn btn-success btn-sm" type="submit" value="Agregar">
			<a class="btn btn-primary btn-sm"href="{{ url('departamentos') }}">Regresar</a>

		</div>
	</div>
</div>

</form>

</div>

                
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
<!-- /page content -->

@include('contenedor.footer')

