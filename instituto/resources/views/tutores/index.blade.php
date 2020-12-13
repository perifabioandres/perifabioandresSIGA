@include('contenedor.header')

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Listado de Tutores</h3>
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
					{{	Session::get('Mensaje')}}
					</div>
					@endif

								
					<a href="{{ url('tutores/create')}}" class="btn btn-success">Agregar</a>
					<div class="dropdown-divider"></div>
					<table id="datatable-buttons" class="table table-bordered table-hover" style="width:100%">
					
						<thead class="thead-light">
							<tr>
								<th>#</th>
								<th>DNI</th>
								<th>Nombre - Apellido</th>
								<th>CUIL</th>
								<th>Teléfono</th>
								<th>Correo</th>
								<th>Acciones</th>
															
							</tr>
						
						</thead>
						
						<tbody>

						@foreach($datos as $tutor)
							<tr>
								<td>{{$loop->iteration}}</td>
								
								
								<td>{{ $tutor->dni}}</td>

								<td>
									<a href="{{ route('tutores.show', $tutor->id)}}">{{ $tutor->nombre}} {{ $tutor->apellido}}</a>
									
								</td>
							
								<td>{{ $tutor->cuil}}</td>
								<td>{{ $tutor->telefono}}</td>
								<td>{{ $tutor->correo}}</td>
								
								<td>

								<a class="btn btn-warning btn-sm" href="{{ url('/tutores/'.$tutor->persona_id.'/edit') }}">
									Editar
								</a>

								<form method="post" action="{{ url('/tutores/'.$tutor->persona_id) }}" style="display:inline">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


@include('contenedor.footer')   