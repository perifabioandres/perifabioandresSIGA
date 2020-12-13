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

<h2>Datos del alumno: {{isset($persona->dni)?$persona->dni:old('dni')}} {{isset($persona->nombre)?$persona->nombre:old('nombre')}} {{ isset($persona->apellido)?$persona->apellido:old('apellido')}}</h2>	




<form action="{{ url('detallepagos')}}" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

<input type="hidden" id="alumno_id" name="alumno_id" value="{{$persona->id}}"><!--envio el id del alumno oculto-->

 <div class="modal-body" style="width:800px;">

    <!-- Campo FechaPago-->
    <div class="form-group row">
    <label for="fechapago" class="col-form-label col-md-3 col-sm-3 label-align">Fecha de Pago <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6"> 
    <input type="date"class="form-control" name="fechapago" id="fechapago" value="<?php echo date("Y-n-j"); ?>" disabled/>
    
    </div>
    </div>
    <!--Fin Campo FechaPago-->



<!-- Campo Comprobante-->
    <div class="form-group row">
    <label for="comprobante" class="col-form-label col-md-3 col-sm-3 label-align">Talonario <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">  
    <select id="comprobante" class="custom-select">
      <option value="recibo">Recibo</option>
      <option value="comprobante">Comprobante</option>
      <option value="comprobante">Ticket</option>
     </select>
    </div>
    </div>
 <!--Fin Campo Comprobante-->


 <!-- Campo Cuotas-->
    <div class="form-group row">
    <label for="mesdepago" class="col-form-label col-md-3 col-sm-3 label-align">Cuota a Pagar <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">  
    <select id="pidarticulo" name="pidarticulo" class="form-control selectpicker" data-live-search="true">

    		<option value="">Seleccione la cuota</option>
    @foreach ($cuotas as $cuota)
    		@if($cuota->enero > 0)
            <option value="{{$cuota->id}}_{{$cuota->enero}}_{{$cuota->mes1}}">{{$cuota->titulacion}} | Enero </option>
            @endif
            @if($cuota->febrero > 0)
            <option value="{{$cuota->id}}_{{$cuota->febrero}}_{{$cuota->mes2}}">{{$cuota->titulacion}} | Febrero </option>
            @endif
            @if($cuota->marzo > 0)
            <option value="{{$cuota->id}}_{{$cuota->marzo}}_{{$cuota->mes3}}">{{$cuota->titulacion}} | Marzo </option>
            $monto == {{ $cuota->marzo }}
            @endif
            @if($cuota->abril > 0)
            <option value="{{$cuota->id}}_{{$cuota->abril}}_{{$cuota->mes4}}">{{$cuota->titulacion}} | Abril </option>
 			@endif
     	    @if($cuota->mayo > 0)
            <option value="{{$cuota->id}}_{{$cuota->mayo}}_{{$cuota->mes5}}">{{$cuota->titulacion}} | Mayo </option>
  			@endif
  			@if($cuota->junio > 0)
            <option value="{{$cuota->id}}_{{$cuota->junio}}_{{$cuota->mes6}}">{{$cuota->titulacion}} | Junio </option>
			@endif
			@if($cuota->julio >0)
            <option value="{{$cuota->id}}_{{$cuota->julio}}_{{$cuota->mes7}}">{{$cuota->titulacion}} | Julio </option>
            @endif
            @if($cuota->agosto >0)
            <option value="{{$cuota->id}}_{{$cuota->agosto}}_{{$cuota->mes8}}">{{$cuota->titulacion}} | Agosto</option>
			@endif
			@if($cuota->septiembre >0)
            <option value="{{$cuota->id}}_{{$cuota->septiembre}}_{{$cuota->mes9}}">{{$cuota->titulacion}} | Septiembre </option>
			@endif
			@if($cuota->septiembre >0)
            <option value="{{$cuota->id}}_{{$cuota->octubre}}_{{$cuota->mes10}}">{{$cuota->titulacion}} | Octubre </option>
            @endif
            @if($cuota->noviembre >0)
            <option value="{{$cuota->id}}_{{$cuota->noviembre}}_{{$cuota->mes11}}">{{$cuota->titulacion}} | Novimbre</option>
            @endif
            @if($cuota->diciembre >0)
            <option value="{{$cuota->id}}_{{$cuota->diciembre}}_{{$cuota->mes12}}">{{$cuota->titulacion}} | Diciembre</option>
            @endif
        @endforeach
      
     </select>

    </div>
    </div>
 <!--Fin Campo Cuotas-->


 <!-- Campo numero de monto-->
    <div class="form-group row">
    <label for="pstock" class="col-form-label col-md-3 col-sm-3 label-align">Monto<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">  
  	<input class="form-control" disabled name="pstock" id="pstock" >

    </div>
    </div>
 <!--Fin Campo numero de monto-->


 <!-- Campo numero de fecha vencimiento-->
    <div class="form-group row">
    <label for="pprecio_venta" class="col-form-label col-md-3 col-sm-3 label-align">Fecha de Vencimiento<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">  
  	<input class="form-control" disabled name="pprecio_venta" id="pprecio_venta" >
  	<!--<input  name="pprecio_venta" id="pprecio_venta">-->
    </div>
    </div>
 <!--Fin Campo numero de fecha vencimiento-->

  <!-- Campo numero de pdescuento-->
    <div class="form-group row">
    <label for="pdescuento" class="col-form-label col-md-3 col-sm-3 label-align">Descuento<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">  
  	<input type="number" min=0 class="form-control" name="pdescuento" id="pdescuento" >
    </div>
    </div>
 <!--Fin Campo numero de pdescuento-->

  <!-- Campo tipo de pago-->
    <div class="form-group row">
    <label for="comprobante" class="col-form-label col-md-3 col-sm-3 label-align">Forma de Pago <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">  
    <select id="tipopagos" class="custom-select">

    @foreach ($tipopagos as $tipopago)
            <option value="{{ $tipopago->id }}"> {{ $tipopago->nombre }}</option>
        @endforeach
     </select>
    </div>
    </div>
 <!--Fin Campo tipo de pago-->

  <!-- Campo numero de comprobante-->
    <div class="form-group row" id="numerocomprobante">
    <label for="numerocomprobante" class="col-form-label col-md-3 col-sm-3 label-align">Número de Comprobante<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">  
  	<input type="number" min=0 class="form-control" name="numerocomprobante" id="numerocomprobante" >
    </div>
    </div>
 <!--Fin Campo numero de comprobante-->



<!--<input type="number" name="cantidad" id="pcantidad" value=10> -->
<!-- <input type="number" name="pprecio_compra" id="pprecio_compra">
 <input type="number" name="pprecio_venta" id="pprecio_venta">
 -->

	<div class="form-group row">
		<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
	</div>


<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
		<thead style="background-color: #A9D0F5">
			<th>Opciones</th>
			<th>Cuota</th>
			<th>Monto</th>
			<th>Vencimiento</th>
			<th>Intereses</th>
			<th>Descuento</th>
			<th>Subtotal</th>
		</thead>
		<tfoot>
			<th>Total</th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th><h4 id="total">$/. 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
		</tfoot>
		<tbody>
			
		</tbody>

	</table>
	
</div>
</div>




<br/>
<br/>
<br/>
<br/>
    	
    <div class="form-group">
        <div class="col-md-6 offset-md-3" id="guardar">
	       	<br/>
				<input class="btn btn-success btn-sm" type="submit" value="Pagar">
				<a class="btn btn-primary btn-sm" href="{{ url('detallepagos') }}">Regresar</a>
		</div>
	</div>
</div>

</div>



<div class="form-group">
	 <div class="col-md-6 offset-md-3">
<!--<input  name="pprecio_venta" id="pprecio_venta">
<input  name="pstock" id="pstock">-->
</div>
</div>

</form>        


                </div>
            </div>
        </div>
      </div>
  </div>
</div>
<!-- /page content -->
@push('scripts')

<script>

	$(document).ready(function(){
		$('#bt_add').click(function(){
			agregar();
		});
	});

	var cont=0;
	total=0;
	subtotal=[];

	$('#guardar').hide();
	$('#numerocomprobante').hide();

	$("#pidarticulo").change(mostrarValores);

	$("#tipopagos").change(tipopagos);

	function mostrarValores()
	{
		datosArticulo=document.getElementById('pidarticulo').value.split('_');
		$("#pprecio_venta").val(datosArticulo[2]);
		$("#pstock").val(datosArticulo[1]);
	}

	function agregar(){
			/*
		//idarticulo=$("#pidarticulo").val();
		articulo=$("#pidarticulo option:selected").text();
		cantidad=$("#pcantidad").val();
		precio_compra=$("pprecio_compra").val();
		*/
		//precio_venta=$("pprecio_venta").val();
		datosArticulo=document.getElementById('pidarticulo').value.split('_');

		idarticulo=datosArticulo[0];

		cuota=datosArticulo;


	 //cuota_id=datosArticulo[0];


		precio_venta=$("#pprecio_venta").text();
		
		
		//idarticulo=1;
		//articulo="Marzo";
		articulo=$("#pidarticulo option:selected").text();
		monto_cuota=$("#pstock").val();//monto de la cuota
		descuento=$("#pdescuento").val();

		

		//cantidad=2;
		precio_compra=$("#pprecio_venta").val();
		//precio_venta=15;
		//descuento=10;

		if(idarticulo !="" && monto_cuota !="" && monto_cuota>0){
			subtotal[cont]=(monto_cuota-(monto_cuota*descuento)/100);
			total=total+subtotal[cont];

			//var fila='<tr class="selected"><td><button type="button" class="btn btn-warning">X</button><td/></tr>';
			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="text" name="monto_cuota[]" value="'+monto_cuota+'"></td><td><input type="text" name="precio_compra[]" value="'+precio_compra+'"></td><td><input type="text" name="precio_venta[]" value="'+precio_venta+'"></td><td><input type="text" name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td><input type="hidden" name="cuota[]" value="'+cuota+'"></tr>';


			cont++;
			limpiar();
			$("#total").html("$/. "+ total);
			$("#total_venta").val(total);//total general de la suma de las cuotas
			evaluar();
			$('#detalles').append(fila);

		}else{
			alert("Error al ingresar el mes de cobro");
		}

	}


	function limpiar(){
		$("#pidarticulo").val("");
		$("#pidarticulo option:selected").text("");
		$("#pcantidad").val("");
		$("#pprecio_venta").val("");
		$("#pstock").val("");
		$("#numerocomprobante").val("");

	}

	function evaluar(){
		if (total>0){
			$("#guardar").show();
		}else{
			$("#guardar").hide();
		}
	}

   tipopago=$("#tipopagos option:selected").text();

	
	function tipopagos()
	{
		if( tipopago == "Efectivo"){
			$("#numerocomprobante").hide();
		} else{
			$("#numerocomprobante").show();
		}
	}


	function eliminar(index){
		total=total-subtotal[index];
		$("#total").html("$/. " + total);
		$("#total_venta").val(total);
		$("#fila" + index).remove();
		evaluar();
	}


</script>

@endpush


@include('contenedor.footer')    