@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Editar Alumno</h3>
        </div>
      
    </div>

    <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_content">

<div class="container">

@if (count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>
@endif



<div class="">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos del alumno: {{isset($alumno->dni)?$alumno->dni:old('dni')}} - {{isset($alumno->nombre)?$alumno->nombre:old('nombre')}} {{ isset($alumno->apellido)?$alumno->apellido:old('apellido')}}</h2>	
					        
                         
                  
                 <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Alumno</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Grupo Familiar</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Inscripciones</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab1" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact" aria-selected="false">Cuotas</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<form action="{{ url('/alumnos/'.$alumno->persona_id)}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}	

{{ method_field('PATCH')}}

    <!-- Campo Tipo documento-->
   <div class="form-group row">
    <label for="dni_id" class="col-form-label col-md-3 col-sm-3 label-align">Tipo de Documento <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    <select class="custom-select {{$errors->has('dni_id')?'is-invalid':''}}" id="dni_id" name="dni_id">
                
        @foreach ($documentos as $documento)
           <option value="{{ $documento->id }}" {{$documento->id == $alumno->dni_id ? 'selected' : ''}}> {{ $documento->abreviatura }}</option>
        @endforeach

    </select>
    {!! $errors->first('dni_id','<div class="invalid-feedback">:message</div>')!!}
    </div>
  </div>
    <!--Fin Tipo documento-->

<?php //dd($alumno); ?>
<!-- Campo DNI-->
	<div class="form-group row">
    <label for="dni" class="col-form-label col-md-3 col-sm-3 label-align">Documento Nº <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">	
	<input type="text" class="form-control {{$errors->has('dni')?'is-invalid':''}}" name="dni" id="dni" value="{{ isset($alumno->dni)?$alumno->dni:old('dni')}}">

	{!! $errors->first('dni','<div class="invalid-feedback">:message</div>')!!}
    </div>
	</div>
<!--Fin Campo DNI-->


<!-- Campo Nombre-->
 	<div class="form-group row">
    <label for="nombre" class="col-form-label col-md-3 col-sm-3 label-align">Nombre <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">   	
	<input type="text"class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" value="{{ isset($alumno->nombre)?$alumno->nombre:old('nombre')}}">
	{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>')!!}
	</div>
	</div>
<!--Fin Campo Nombre-->


<!-- Campo Apellido-->
 	<div class="form-group row">
    <label for="apellido" class="col-form-label col-md-3 col-sm-3 label-align">Apellido <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">  	
	<input type="text"class="form-control {{$errors->has('apellido')?'is-invalid':''}}" name="apellido" id="apellido" value="{{ isset($alumno->apellido)?$alumno->apellido:old('apellido')}}">
	{!! $errors->first('apellido','<div class="invalid-feedback">:message</div>')!!}
	</div>
	</div>
<!--Fin Campo Apellido-->


<!-- Campo Sexo-->
 	<div class="form-group row">
    <label for="sexo" class="col-form-label col-md-3 col-sm-3 label-align">Genero <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">  
	<select id="sexo" class="custom-select {{$errors->has('sexo')?'is-invalid':''}}" name="sexo"  value="{{ isset($alumno->sexo)?$alumno->sexo:old('sexo')}}">
	  
        <option value="{{ $alumno->sexo}}" {{$alumno->persona_id == $alumno->sexo ? 'selected' : ''}}> {{ $alumno->sexo }}</option>
      <option value="Masculino">Masculino</option>
	  <option value="Femenino">Femenino</option>
	  <option value="Otro">Otro</option>
	 </select>
	{!! $errors->first('sexo','<div class="invalid-feedback">:message</div>')!!}
	</div>
	</div>
<!--Fin Campo Sexo-->


<!-- Campo FechaNacimiento-->
	<div class="form-group row">
    <label for="fechanacimiento" class="col-form-label col-md-3 col-sm-3 label-align">Fecha de Nacimiento <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6"> 
	<input type="date"class="form-control {{$errors->has('fechanacimiento')?'is-invalid':''}}" name="fechanacimiento" id="fechanacimiento" value="{{ isset($alumno->fechanacimiento)?$alumno->fechanacimiento:old('fechanacimiento')}}">
	{!! $errors->first('fechanacimiento','<div class="invalid-feedback">:message</div>')!!}
	</div>
	</div>
<!--Fin Campo FechaNacimiento-->

<!-- Campo Cuil-->
    <div class="form-group row">
    <label for="cuil" class="col-form-label col-md-3 col-sm-3 label-align">CUIL <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">    
    <input type="text" class="form-control {{$errors->has('cuil')?'is-invalid':''}}"name="cuil" id="cuil" value="{{ isset($alumno->cuil)?$alumno->cuil:old('cuil')}}" data-inputmask="'mask': '99-99999999-9'">
    {!! $errors->first('cuil','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Cuil-->


<!-- Datos Geograficos-->
    <div class="form-group row">
    <label for="pais_id" class="col-form-label col-md-3 col-sm-3 label-align">País <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
	<select class="custom-select {{$errors->has('pais_id')?'is-invalid':''}}" id="pais_id" name="pais_id">
	
	@foreach ($paises as $pais)
		<option value="{{ $pais->id }}"> {{ $pais->nombre }}</option>

	@endforeach

	</select>
	{!! $errors->first('pais_id','<div class="invalid-feedback">:message</div>')!!}
	</div>
	</div>


    <div class="form-group row">
    <label for="provincia_id" class="col-form-label col-md-3 col-sm-3 label-align">Provincia <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
	<select class="custom-select" id="provincia_id" name="provincia_id">
		
		<option value="">Seleccione la provincia</option>

	</select>
	</div>
	</div>

	<div class="form-group row">
    <label for="departamento_id" class="col-form-label col-md-3 col-sm-3 label-align">Departamento <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
	<select class="custom-select" id="departamento_id" name="departamento_id">
									 
		<option value="">Seleccione el departamento</option>

	</select>
	</div>
	</div>


    <div class="form-group row">
    <label for="localidad_id" class="col-form-label col-md-3 col-sm-3 label-align">Localidad<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
	<select class="custom-select" id="localidad_id" name="localidad_id">
			
		@foreach ($localidades as $loca)
			
			<option value="{{ $loca->id }}" {{$loca->id == $alumno->localidad_id ? 'selected' : ''}}> {{ $loca->nombre }}</option>

		@endforeach


	</select>
	</div>
	</div>


<!--Fin datos geograficos-->

<!-- Campo direccion-->
    <div class="form-group row">
    <label for="direccion" class="col-form-label col-md-3 col-sm-3 label-align">Dirección <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
	<input type="text"class="form-control {{$errors->has('direccion')?'is-invalid':''}}" name="direccion" id="direccion" value="{{ isset($alumno->direccion)?$alumno->direccion:old('direccion')}}">
	{!! $errors->first('direccion','<div class="invalid-feedback">:message</div>')!!}
	</div>
    </div>
<!--Fin Campo direccion-->

<!-- Campo numero-->
    <div class="form-group row">
    <label for="numero" class="col-form-label col-md-3 col-sm-3 label-align">Altura</label>
    <div class="col-md-6 col-sm-6"> 	
	<input type="text"class="form-control {{$errors->has('numero')?'is-invalid':''}}" name="numero" id="numero" value="{{ isset($alumno->numero)?$alumno->numero:old('numero')}}">
	{!! $errors->first('numero','<div class="invalid-feedback">:message</div>')!!}
	</div>
	</div>
<!--Fin Campo numero-->


<!-- Campo Telefono-->
    <div class="form-group row">
    <label for="telefono" class="col-form-label col-md-3 col-sm-3 label-align">Telefono <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">   
    <input data-inputmask="'mask' : '(999) 999-9999'" type="text"class="form-control {{$errors->has('telefono')?'is-invalid':''}}" name="telefono" id="telefono" value="{{ isset($alumno->telefono)?$alumno->telefono:old('telefono')}}">
    {!! $errors->first('telefono','<div class="invalid-feedback">:message</div>')!!}
    </div>
    </div>
<!--Fin Campo Telefono-->


<!-- Campo Correo-->
    <div class="form-group row">
    <label for="correo" class="col-form-label col-md-3 col-sm-3 label-align">Correo <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6"> 
	<input type="email" class="form-control {{$errors->has('correo')?'is-invalid':''}}" name="correo" id="correo" value="{{ isset($alumno->correo)?$alumno->correo:old('correo')}}">
	{!! $errors->first('correo','<div class="invalid-feedback">:message</div>')!!}
	</div>
    </div>
<!--Fin Campo Correo-->


<div class="field item form-group">
<label for="activo"class="col-form-label col-md-3 col-sm-3  label-align">Activo<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input type="checkbox" class="js-switch" unchecked name="activo" id="activo" value="{{ isset($alumno->activo)?$alumno->activo:old('activo')}}"> 
</label>
</div>
</div>



<!-- Botones-->
<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
          <br/>
			<input type="submit" class="btn btn-success" Value="Modificar">

			<a class="btn btn-primary" href="{{ url('alumnos')}}">Regresar</a>

        </div>
    </div>
</div>
<!-- Botones-->

</form>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                     
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Agregar
</button>
<br/><br/>

<!-- Modal -->
<div class="modal fade modal-xl" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width:800px;">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Parentesco</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width:800px;">


<form action="{{ url('alumnoTutor')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}  



    <table id="datatable-checkbox" class="table table-bordered table-hover" style="width:100%">
                 
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>CUIL</th>
                                <th>Telefono</th>
                                <th>Parentesco</th>
                                                                                       
                            </tr>
                        
                        </thead>
                        
                        <tbody>

                        @foreach($personas as $persona)
                            <tr>
                                <th><input type="checkbox" id="persona_id" value="{{ $persona->id }}" name="persona_id[]"></th>      
                                <th>{{$persona->id}}</th>
                                <td>{{ $persona->dni}}</td>
                                <td> {{$persona->nombre}} {{ $persona->apellido}} </td> 
                                <td>{{ $persona->cuil}}</td>
                                <td>{{ $persona->telefono}}</td>
                                
                                <td>
                                    <select id="parentesco_id" name="parentesco_id[]" class="custom-select">

                                     <option value="0" disabled="true" selected="true">Parentesco</option>
                                        @foreach ($parentescos as $pariente)

                                        <option value="{{ $pariente->id }}"> {{ $pariente->nombre }}</option>

                                        @endforeach

                                    </select>
                                    
                                </td>
                                                                                           
                                
                            </tr>
                        @endforeach

                        </tbody>

<!--Este campo uso para gurardar el id_alumno cn id_parientes (relaciono) -->
<input type="hidden" name="alumno_id" id="alumno_id" value="{{$alumno->alumno_id}}">
            
            </table>


    <div class="modal-footer">
        
        <input type="submit" class="btn btn-success" Value="Agregar">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
     
    </div>


</form>

      </div>
      
 
    </div>
  </div>
</div>

<!-- Fin del Modal -->
<table id="datatable-checkbox" class="table table-bordered table-hover" style="width:100%">
                 
                        <thead class="thead-light">
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>CUIL</th>
                                <th>Telefono</th>
                                <th>Parentesco</th>
                                <th>Acciones</th>
                                                                                          
                            </tr>
                        
                        </thead>
                        
                        <tbody>

                        @foreach($parientes as $alumno)
                            <tr>
                                   
                                <td>{{ $alumno->dni}}</td>
                                <td> {{ $alumno->nombre_tutor}} {{ $alumno->apellido}} </td> 
                                <td>{{ $alumno->cuil}}</td>
                                <td>{{ $alumno->telefono}}</td>
                                <td>{{ $alumno->nombre}}</td>

                                <td>
                                
                                <form method="post" action="{{ url('/alumnoTutor/'.$alumno->relacion)}}" >
                                 
                                {{ csrf_field() }}
                                
                                {{ method_field('DELETE')}}

                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Seguro que quiere Borrar?')">Borrar</button>

                                </form>


                                </td>
                        
                                                                                           
                                
                            </tr>
                        @endforeach


                        </tbody>


</table>



                      </div>
                      <!--Datos de la cursada-->
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    
<table id="datatable" class="table table-bordered table-hover" style="width:100%">

	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Año</th>
			<th>Normativa - Titulación</th>
			<th>Curso</th>
			<th>División</th>
			<th>Turno</th>
			<th>Alumno</th>
		</tr>
	</thead>

	<tbody>
	@foreach($inscripciones as $inscripcion)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{ $inscripcion->anio}}</td>
			<td>{{ $inscripcion->numero}} - {{ $inscripcion->titulacion}}</td>
			<td>{{ $inscripcion->curso}}</td>
			<td>{{ $inscripcion->division}}</td>
			<td>{{ $inscripcion->turno}}</td>
			<td>{{ $inscripcion->dni}}-{{ $inscripcion->apellido}}-{{ $inscripcion->nombre}}</td>

	@endforeach
		</tr>

	</tbody>

</table>





                      </div>
                       <!--Datos de la cursada-->
 					

 					   <!--Datos de las cuotas-->
                       <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
                      Aca van las cuotas
                       </div>
                      <!--Datos de las cuotas-->
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>




</div>
<script>
	$(document).ready(function($){
		//alert("Texto a mostrar");
		$("#Cuil").mask("99-99999999-9");
		$("#Telefono").mask("9999-999999");
	});
</script>


</div><!--Fin del div conteiner-->
  

              
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
<!-- /page content -->

@include('contenedor.footer')    

