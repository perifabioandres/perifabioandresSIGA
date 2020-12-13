@include('contenedor.header')

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Listado de Localidades</h3>
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


<a href="{{ url('localidades/create') }}" class="btn btn-success">Agregar</a>
<div class="dropdown-divider"></div>

<table id="datatable" class="table table-bordered table-hover" style="width:100%" >
	
	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Localidad</th>
			<th>Departamento</th>
			<th>Provincia</th>
			<th>País</th>
			<th>Acciones</th>
		</tr>

	</thead>

	<tbody>
	@foreach($datos as $localidad)
		
		<tr>
			
			<td>{{$loop->iteration}}</td>
			<td>{{$localidad->nombre}}</td>
			<td>{{$localidad->nombreDep}}</td>
			<td>{{$localidad->nombre_provincia}}</td>
			<td>{{$localidad->nombre_pais}}</td>
						
			<td>

			<a class="btn btn-warning btn-sm" href="{{ url('/localidades/'.$localidad->id.'/edit')}}">

			Editar</a>


			<form method="post" action="{{ url('/localidades/'.$localidad->id) }}" style="display:inline">
			{{ csrf_field() }}

			{{ method_field('DELETE')}}
			<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Seguro que quiere Borrar')">Borrar</button>

			</form>

			</td>

		</tr>
	
	@endforeach
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