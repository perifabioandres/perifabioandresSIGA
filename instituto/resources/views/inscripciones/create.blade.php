@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Agregar Inscripción</h3>
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
	<p>Por favor complete lo siguiente:</p>
	<ul>
		@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

		@endforeach

	</ul>
</div>

@endif


<form action="{{ url('/inscripciones')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{ csrf_field() }}


<div class="field item form-group">
<label for="alumno" class="col-form-label col-md-3 col-sm-3  label-align">Buscar alumno<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select id="alumno_id" name="alumno_id" class="form-control selectpicker" data-live-search="true">

	<option value="0" disabled="true" selected="true">Seleccione el alumno</option>
	@foreach ($alumnos as $alumno)

		<option value="{{ $alumno->id }}"> {{$alumno->dni}} - {{$alumno->apellido}} {{ $alumno->nombre }}</option>
		
	@endforeach

</select>
</div>
</div>


<div class="field item form-group">
<label for="cursada" class="col-form-label col-md-3 col-sm-3  label-align">Buscar curso<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select id="cursada_id" name="cursada_id" class="form-control selectpicker {{$errors->has('cursada_id')?'is-invalid':''}}" data-live-search="true">

	<option value="0" disabled="true" selected="true">Seleccione el curso</option>
	@foreach ($cursadas as $cursada)

		<option value="{{ $cursada->id }}"> {{$cursada->anio}} - {{$cursada->numero}} - {{$cursada->titulacion}} - {{ $cursada->curso }} - {{ $cursada->division }} - {{ $cursada->turno }}
		</option>
		
	@endforeach
 {!! $errors->first('cursada_id','<div class="invalid-feedback">:message</div>')!!}
</select>
</div>
</div>


<div class="field item form-group">
<label for="fecha" class="col-form-label col-md-3 col-sm-3  label-align">Fecha<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control {{$errors->has('fecha')?'is-invalid':''}}" type="date" name="fecha" id="fecha" value="{{ isset($inscripcion->fecha)?$inscripcion->fecha:old('fecha')}}">
{!! $errors->first('fecha','<div class="invalid-feedback">:message</div>')!!}

</div>
</div>

										

<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>
				<input type="submit" class="btn btn-success btn-sm" value="Agregar">
				<a href="{{ url('inscripciones')}}" class="btn btn-primary btn-sm">Regresar</a>
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