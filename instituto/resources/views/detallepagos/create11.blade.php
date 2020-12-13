@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Agregar Cobro</h3>
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

		<li>{{ $error }}</li>

		@endforeach

	</ul>
</div>

@endif


<form action="{{ url('/detallepagos')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{ csrf_field() }}


<div class="field item form-group">
<label for="alumno" class="col-form-label col-md-3 col-sm-3  label-align">Buscar alumno<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select id="alumno_id" name="alumno_id" class="form-control">

	<option value="0" disabled="true" selected="true">Seleccione el alumno</option>
	@foreach ($alumnos as $alumno)

		<option value="{{ $alumno->id }}"> {{$alumno->dni}} - {{$alumno->Apellido}} {{ $alumno->Nombre }}</option>
		
	@endforeach

</select>
</div>
</div>




				
										


<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>
				<input type="submit" class="btn btn-success btn-sm" value="Agregar">
				<a href="{{ url('detallepagos')}}" class="btn btn-primary btn-sm">Regresar</a>
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