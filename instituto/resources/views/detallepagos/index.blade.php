@include('contenedor.header')


 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Listado de Alumnos</h3>
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

								
					<a href="{{ url('detallepagos/create')}}" class="btn btn-success">Agregar</a>
					<div class="dropdown-divider"></div>

					<table id="datatable" class="table table-bordered table-hover" style="width:100%">
					
						<thead class="thead-light">
							<tr>
								<th>#</th>
							
								<th>DNI</th>
								<th>Alumno</th>
								<th>CUIL</th>
								<th>Telefono</th>
								<th>Correo</th>
								<th>Estado</th>
								<th>Pagar</th>
										
							</tr>
						
						</thead>
						
						<tbody>

						@foreach($datos as $alumno)
							<tr>
								<td>{{$loop->iteration}}</td>
								
								<td>{{ $alumno->dni}}</td>

								<td>
									<a href="{{ route('detallepagos.show', $alumno->id)}}">{{ $alumno->nombre}} {{ $alumno->apellido}}</a>
									
								</td>
							
							
								<td>{{ $alumno->cuil}}</td>
								<td>{{ $alumno->telefono}}</td>
								<td>{{ $alumno->correo}}</td>
								<td></td>
								
								<td>
								<a class="btn btn-primary btn-sm" href="{{ url('/detallepagos/'.$alumno->id.'/edit') }}">
									Pagar
								</a>

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