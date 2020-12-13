@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Listado de Inscripciones</h3>
        </div>
      
    </div>

    <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_content">

<div class="container">


@if(Session::has('Mensaje'))
	<div class="alert alert-success" role="alert">
	{{Session::get('Mensaje')}}
	</div>
@endif

@if(Session::has('Mensaje1'))
	<div class="alert alert-danger" role="alert">
	{{Session::get('Mensaje1')}}
	</div>
@endif


<a href="{{ url('inscripciones/create')}}" class="btn btn-success">Agregar</a>
<br/>
<div class="dropdown-divider"></div>

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
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>
		
	@foreach($datos as $inscripcion)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{ $inscripcion->anio}}</td>
			<td>{{ $inscripcion->numero}} - {{ $inscripcion->titulacion}}</td>
			<td>{{ $inscripcion->curso}}</td>
			<td>{{ $inscripcion->division}}</td>
			<td>{{ $inscripcion->turno}}</td>
			<td>{{ $inscripcion->dni}}-{{ $inscripcion->apellido}}-{{ $inscripcion->nombre}}</td>
			<td>

				<a class="btn btn-warning btn-sm" href="{{ url('/inscripciones/'.$inscripcion->id.'/edit')}}">Editar</a>

				<form method="post" action="{{ url('/inscripciones/'.$inscripcion->id)}}" style="display:inline">
				{{ csrf_field() }}
				{{ method_field('DELETE')}}

				<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Seguro que desea Borrar');">Borrar</button>
				</form>
			</td>
	@endforeach
		</tr>

	</tbody>

</table>

</div>                    
              
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
<!-- /page content -->

@include('contenedor.footer')    
