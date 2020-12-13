@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Agregar Curso/Grado/Modulo</h3>
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


<form action="{{ url('/cursos')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{ csrf_field() }}


<div class="field item form-group">
<label for="oferta" class="col-form-label col-md-3 col-sm-3  label-align">Oferta<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select id="oferta_id" name="oferta_id" class="form-control">

	<option value="0" disabled="true" selected="true">Seleccione la oferta</option>
	
	@foreach ($ofertas as $oferta)

		<option value="{{ $oferta->id }}"> {{ $oferta->numero }} - {{ $oferta->titulacion }} </option>
		
	@endforeach

</select>
</div>
</div>

<div class="field item form-group">
<label for="nombre" class="col-form-label col-md-3 col-sm-3  label-align">Curso/Grado/Modulo<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" value="{{ isset($curso->nombre)?$curso->nombre:old('nombre')}}">
{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
</div> 
</div>



<div class="field item form-group">
<label for="descripcion" class="col-form-label col-md-3 col-sm-3  label-align">Descripción</label>
<div class="col-md-6 col-sm-6">
<input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ isset($curso->descripcion)?$curso->descripcion:''}}">
</div>
</div>


<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>
			<input type="submit" class="btn btn-success btn-sm" value="Agregar">
			<a href="{{ url('cursos')}}" class="btn btn-primary btn-sm">Regresar</a>
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

