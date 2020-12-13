@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{	Session::get('Mensaje')}}
</div>
@endif

<h3 align="center">Listado de Colegios</h3>
<div class="dropdown-divider"></div>



<a href="{{ url('colegios/create')}}" class="btn btn-success">Agregar</a>


<table class="table table-light table-hover">

	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Foto</th>
			<th>Nombre</th>
			<th>Fecha de Inicio</th>
			<th>CUIT</th>
			<th>Dirección</th>
			<th>Número</th>
			<th>Teléfono</th>
			<th>Correo</th>
			<th>Web</th>
			<th>Acciones</th>
			
			
		</tr>
	
	</thead>
	
	<tbody>

	@foreach($colegios as $colegio)
		<tr>
			<td>{{$loop->iteration}}</td>
			
			<td>
				<img src="{{ asset('storage').'/'.$colegio->foto}}" class="img-thumbnail img-fluid" alt="" width="150">
				
			</td>
			<td><a href="{{ route('colegios.show', $colegio->id)}}">{{ $colegio->nombre}}</a></td>
			
			<td>{{ $colegio->FechaInicio}}</td>
			<td>{{ $colegio->cuit}}</td>
			<td>{{ $colegio->direccion}}</td>
			<td>{{ $colegio->numero}}</td>
			<td>{{ $colegio->telefono}}</td>
			<td>{{ $colegio->correo}}</td>
			<td>{{ $colegio->web}}</td>
			
			<td>

			<a class="btn btn-warning btn-sm" href="{{ url('/colegios/'.$colegio->id.'/edit') }}">
				Editar
			</a>

			<form method="post" action="{{ url('/colegios/'.$colegio->id) }}" style="display:inline">
			{{ csrf_field() }}
			
			{{ method_field('DELETE')}}

			<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Seguro que quiere Borrar?')">Borrar</button>

			</form>

			</td>
			
			
		</tr>
	@endforeach

	</tbody>


</table>

{{ $colegios->links() }}

</div>

@endsection