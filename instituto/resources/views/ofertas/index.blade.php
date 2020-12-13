@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Listado de Ofertas</h3>
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


	
<a href="{{ url('ofertas/create') }}" class="btn btn-success">Agregar</a>

<div class="dropdown-divider"></div>

<table id="datatable" class="table table-bordered table-hover" style="width:100%">
	
	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Titulación</th>
			<th>Normativa - Número</th>
			<th>Fecha</th>
			<th>Modalidad</th>
			<th>Nivel</th>
			<th>Acciones</th>
		</tr>

	</thead>

	<tbody>
	@foreach($datos as $oferta)
		
		<tr>
			
			<td>{{$loop->iteration}}</td>
			<td>{{$oferta->titulacion}}</td>
			<td>{{$oferta->nombre_normativa}} {{$oferta->numero}}</td>
			<td>{{$oferta->fecha}}</td>
			<td>{{$oferta->nombre_modalidad}}</td>
			<td>{{$oferta->nombre_nivel}}</td>
						
			<td>

			<a class="btn btn-warning btn-sm" href="{{ url('/ofertas/'.$oferta->id.'/edit')}}">

			Editar</a>


			<form method="post" action="{{ url('/ofertas/'.$oferta->id) }}" style="display:inline">
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


