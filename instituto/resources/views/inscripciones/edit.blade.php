@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Editar Inscripción</h3>
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


<form action="{{ url('/inscripciones/'.$inscripciones->id)}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH')}}


<div class="field item form-group">
<label for="alumno" class="col-form-label col-md-3 col-sm-3  label-align">Buscar alumno<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select id="alumno_id" name="alumno_id" class="form-control">

	
@foreach ($alumnos as $persona)
								
<option value="{{ $persona->id }}" {{$persona->id == $alumno->persona_id ? 'selected' : ''}}>{{ $persona->dni}} - {{ $persona->apellido }} {{ $persona->nombre }}</option>

@endforeach


</select>
</div>
</div>

<div class="field item form-group">
<label for="cursada" class="col-form-label col-md-3 col-sm-3  label-align">Buscar curso<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select id="cursada_id" name="cursada_id" class="form-control">

	<option value="0" disabled="true" selected="true">Seleccione el curso</option>
	@foreach ($cursadas as $cursada)

<option value="{{ $cursada->id }}" {{$cursada->id == $inscripciones->cursada_id ? 'selected' : ''}}>{{$cursada->anio}} - {{$cursada->numero}} - {{$cursada->titulacion}} - {{ $cursada->curso }} - {{ $cursada->division }} - {{ $cursada->turno }}</option>
		
	@endforeach


</select>
</div>
</div>


<div class="field item form-group">
<label for="fecha" class="col-form-label col-md-3 col-sm-3  label-align">Fecha<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control {{$errors->has('fecha')?'is-invalid':''}}" type="date" name="fecha" id="fecha" value="{{isset($fecha->fecha)?$fecha->fecha:old('fecha')}}" >

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