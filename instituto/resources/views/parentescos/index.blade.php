@include('contenedor.header')

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Listado de Parentesco</h3>
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

<a href="{{ url('parentescos/create') }}" class="btn btn-success">Agregar</a>
<br/>
<div class="dropdown-divider"></div>

<table id="datatable" class="table table-bordered table-hover" style="width:100%">

	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Parentesco</th>
			<th>Acciones</th>
		</tr>

	</thead>
	
	<tbody>
	@foreach($parentescos as $parentesco)
		<tr>
			<td>{{ $loop->iteration}}</td>
			<td>{{ $parentesco->nombre }}</td>
			<td>
			<a class="btn btn-warning btn-sm" href="{{ url('/parentescos/'.$parentesco->id.'/edit') }}">Editar</a> 

			<form method="post" action="{{ url('/parentescos/'.$parentesco->id) }}" style="display:inline">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Seguro que quiere borrar?');">Borrar</button>
				
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
        <!-- /page content -->


@include('contenedor.footer')  