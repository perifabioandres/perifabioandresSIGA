@include('contenedor.header')

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Editar Departamento: faltaaaa..!!!</h3>
        </div>
      
    </div>

    <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_content">
                      


<div class="container">



<form action="{{ url('/departamentos/'.$departamento->id)}}" method="post">

{{ csrf_field() }}
{{ method_field('PATCH') }}<!--Metodo para actualizar el registro-->	

<div class="field item form-group">
<label for="Pais" class="col-form-label col-md-3 col-sm-3  label-align">País<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select id="pais_id" name="pais_id" class="form-control">
		
	@foreach ($paises as $pais)
		
		<option value="{{ $pais->id }}" {{$pais->id == $provincia->pais_id ? 'selected' : ''}}> {{ $pais->Nombre }}</option>
		
		
	@endforeach
	
</select>
</div>
</div>

<div class="field item form-group">
<label for="provincia_id" class="col-form-label col-md-3 col-sm-3  label-align">Provincia<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select class="form-control" id="provincia_id" name="provincia_id">
	
	
	<option value="{{ $provincia->id}}">{{$provincia->nombre}}</option>
	
</select>
</div>
</div>


<div class="field item form-group">
<label for="nombre" class="col-form-label col-md-3 col-sm-3  label-align">Departamento<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input type="text" class="form-control" name="nombre" id="nombre" value="{{ $departamento->nombre }}">
</div>
</div>

<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>

				<input class="btn btn-success btn-sm" type="submit" value="Modificar">
				<a class="btn btn-primary btn-sm" href="{{ url('departamentos') }}">Regresar</a>

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