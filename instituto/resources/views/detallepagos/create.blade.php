@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Pago de Cuotas</h3>
        </div>
      
    </div>

    <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_content">
                  


<!-- Campo Nombre-->

<h2>Datos del alumno: {{isset($alumno->dni)?$alumno->dni:old('dni')}} {{isset($alumno->nombre)?$alumno->nombre:old('nombre')}} {{ isset($alumno->apellido)?$alumno->apellido:old('apellido')}}</h2>	


<!--Fin Campo Nombre-->
 <div class="modal-body" style="width:800px;">
             <table id="" class="table table-bordered table-hover" style="width:100%">
                 				
					<thead class="thead-light">
							<tr>
								<th>#</th>
								<th>Mes</th>
								<th>Monto</th>
								<th>Fecha de Vencimiento</th>
								<th>Estado</th>
								<th>Recibo</th>
								
							</tr>
						</thead>
							
							@foreach($cuotas as $cuota)
							<tr>
								<td><input type="checkbox" disabled="true"></td>
								<td>Enero</td>
								<td>{{ $cuota->enero}}</td>
								<td>{{ $cuota->mes1}}</td>
								<td></td>
								<td><i class="fa fa-download fa-lg" aria-hidden="true"></i></td>
							</tr>
							<tr>
								<td><input type="checkbox" disabled="true"></td>
								<td>Febrero</td>
								<td>{{ $cuota->febrero}}</td>
								<td>{{ $cuota->mes2}}</td>
								<td></td>
								<td><i class="fa fa-download fa-lg" aria-hidden="true"></i></td>
							</tr>
							<tr BGCOLOR="#2EFE64">
								<td><input type="checkbox" disabled="true"></td>
								<td>Marzo</td>
								<td>{{ $cuota->marzo}}</td>
								<td>{{ $cuota->mes3}}</td>
								<td>Pagado</td>
								<td><i class="fa fa-download fa-lg" aria-hidden="true"></i></td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>Abril</td>
								<td>{{ $cuota->abril}}</td>
								<td>{{ $cuota->mes4}}</td>
								<td>Adeuda</td>
								<td><i class="fa fa-download fa-lg" aria-hidden="true"></i></td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>Mayo</td>
								<td>{{ $cuota->mayo}}</td>
								<td>{{ $cuota->mes5}}</td>
								<td>Adeuda</td>
								<td><i class="fa fa-download fa-lg" aria-hidden="true"></i></td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>Junio</td>
								<td>{{ $cuota->junio}}</td>
								<td>{{ $cuota->mes6}}</td>
								<td>Adeuda</td>
								<td><i class="fa fa-download fa-lg" aria-hidden="true"></i></td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>Julio</td>
								<td>{{ $cuota->julio}}</td>
								<td>{{ $cuota->mes7}}</td>
								<td>Adeuda</td>
								<td><i class="fa fa-download fa-lg" aria-hidden="true"></i></td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>Agosto</td>
								<td>{{ $cuota->agosto}}</td>
								<td>{{ $cuota->mes8}}</td>
								<td>Adeuda</td>
								<td><i class="fa fa-download fa-lg" aria-hidden="true"></i></td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>Septiembre</td>
								<td>{{ $cuota->septiembre}}</td>
								<td>{{ $cuota->mes9}}</td>
								<td>Adeuda</td>
								<td><i class="fa fa-download fa-lg" aria-hidden="true"></i></td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>Octubre</td>
								<td>{{ $cuota->octubre}}</td>
								<td>{{ $cuota->mes10}}</td>
								<td>Adeuda</td>
								<td><i class="fa fa-download fa-lg" aria-hidden="true"></i></td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>Noviembre</td>
								<td>{{ $cuota->noviembre}}</td>
								<td>{{ $cuota->mes11}}</td>
								<td>Adeuda</td>
								<td><i class="fa fa-download fa-lg" aria-hidden="true"></i></td>
							</tr>
							<tr>
								<td><input type="checkbox" ></td>
								<td>Diciembre</td>
								<td>{{ $cuota->diciembre}}</td>
								<td>{{ $cuota->mes12}}</td>
								<td>Adeuda</td>
								<td><i class="fa fa-download fa-lg" aria-hidden="true"></i></td>
							</tr>
							<tr>
								<td></td>
								<td><strong>Total a Pagar</strong></td>
								<td colspan="4"><strong>{{ $cuota->total}}</strong></td>
								
							</tr>
							<tr>
								<td></td>
								<td><strong>Total Pagado</strong></td>
								<td colspan="4"><strong></strong></td>
								
							</tr>
							<tr>
								<td></td>
								<td><strong>Total Adeudado</strong></td>
								<td colspan="4"><strong></strong></td>
								
							</tr>

						@endforeach
						
										
					</table>

<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>

				<input class="btn btn-success btn-sm" type="submit" value="Pagar">
				<a class="btn btn-primary btn-sm" href="{{ url('detallepagos') }}">Regresar</a>

		</div>
	</div>
</div>


                
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
<!-- /page content -->
@include('contenedor.footer')  