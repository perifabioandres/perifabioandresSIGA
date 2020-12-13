@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Fijar Monto de Cuotas</h3>
        </div>
      
    </div>

    <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_content">

<div class="container">


@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
	<ul>
		@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

		@endforeach

	</ul>
</div>

@endif


<form action="{{ url('/cuotas')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{ csrf_field() }}


<div class="field item form-group">
<label for="anio" class="col-form-label col-md-3 col-sm-3  label-align">Año Académico<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select id="anio_id" name="anio_id" class="form-control">

	<option value="0" disabled="true" selected="true">Seleccione el año académico</option>
	@foreach ($anios as $anio)

		<option value="{{ $anio->id }}"> {{ $anio->nombre }}</option>
		
	@endforeach

</select>
</div>
</div>



<div class="field item form-group">
<label for="oferta" class="col-form-label col-md-3 col-sm-3  label-align">Oferta<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select id="oferta_id" name="oferta_id" class="form-control">
	
	<option value="0" disabled="true" selected="true">Seleccione la oferta</option>
	
	@foreach ($ofertas as $oferta)

		<option value="{{ $oferta->id }}"> {{$oferta->numero}} - {{ $oferta->titulacion }}</option>
		
	@endforeach


</select>
</div>
</div>



<div class="field item form-group">
<label for="inscripcion" class="col-form-label col-md-3 col-sm-3  label-align">Monto de Inscripción<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input type="number" min="0" class="form-control {{$errors->has('inscripcion')?'is-invalid':''}}" name="inscripcion" id="inscripcion" value="{{ isset($cuota->inscripcion)?$cuota->inscripcion:old('inscripcion')}}">
{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
</div> 
</div>



<div class="field item form-group">
<label for="descuento" class="col-form-label col-md-3 col-sm-3  label-align">Porcentaje de descuento por grupo familiar<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input type="number" min="0" max="100" class="form-control {{$errors->has('descuento')?'is-invalid':''}}" name="descuento" id="descuento" value="{{ isset($cuota->descuento)?$cuota->descuento:old('descuento')}}">
{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
</div> 
</div>



<div class="field item form-group">
<label for="intereses" class="col-form-label col-md-3 col-sm-3  label-align">Porcentaje de interes por pago fuera de termino<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input type="number" min="0" class="form-control {{$errors->has('intereses')?'is-invalid':''}}" name="intereses" id="intereses" value="{{ isset($cuota->intereses)?$cuota->intereses:old('intereses')}}">
{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
</div> 
</div>



<div class="dropdown-divider"></div>
<label for="cuotas" class="control-label">{{'Establezca Montos de las cuotas y su fecha de vencimiento:'}}</label>
 

<div class="form-group row">
<label class="control-label col-md-2 col-sm-2 "></label>
	<div class="col-md-9 col-sm-9 ">
		<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-2  label-align">Enero</label>
		<div class="col-md-6 col-sm-6">
		<input type="number" min="0" style="text-align:right" name="enero" id="enero">
		<input type="date" name="mes1" id="mes1" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
		</div>
		</div>

		<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-2  label-align">Febrero</label>
		<div class="col-md-6 col-sm-6">
		<input type="number" min="0" style="text-align:right" name="febrero" id="febrero">
		<input type="date" name="mes2" id="mes2" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
		</div>
		</div>

		<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-2  label-align">Marzo</label>
		<div class="col-md-6 col-sm-6">
		<input type="number" min="0" style="text-align:right" name="marzo" id="marzo">
		<input type="date" name="mes3" id="mes3" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
		</div>
		</div>

		<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-2  label-align">Abril</label>
		<div class="col-md-6 col-sm-6">
		<input type="number" min="0" style="text-align:right" name="abril" id="abril">
		<input type="date" name="mes4" id="mes4" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
		</div>
		</div>

		<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-2  label-align">Mayo</label>
		<div class="col-md-6 col-sm-6">
		<input type="number" min="0" style="text-align:right" name="mayo" id="mayo">
		<input type="date" name="mes5" id="mes5" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
		</div>
		</div>

		<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-2  label-align">Junio</label>
		<div class="col-md-6 col-sm-6">
		<input type="number" min="0" style="text-align:right" name="junio" id="junio">
		<input type="date" name="mes6" id="mes6" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
		</div>
		</div>


		<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-2  label-align">Julio</label>
		<div class="col-md-6 col-sm-6">
		<input type="number" min="0" style="text-align:right" name="julio" id="julio">
		<input type="date" name="mes7" id="mes7" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
		</div>
		</div>


		<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-2  label-align">Agosto</label>
		<div class="col-md-6 col-sm-6">
		<input type="number" min="0" style="text-align:right" name="agosto" id="agosto">
		<input type="date" name="mes8" id="mes8" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
		</div>
		</div>


		<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-2  label-align">Septiembre</label>
		<div class="col-md-6 col-sm-6">
		<input type="number" min="0" style="text-align:right" name="septiembre" id="septiembre">
		<input type="date" name="mes9" id="mes9" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
		</div>
		</div>


		<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-2  label-align">Octubre</label>
		<div class="col-md-6 col-sm-6">
		<input type="number" min="0" style="text-align:right" name="octubre" id="octubre">
		<input type="date" name="mes10" id="mes10" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
		</div>
		</div>


		<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-2  label-align">Noviembre</label>
		<div class="col-md-6 col-sm-6">
		<input type="number" min="0" style="text-align:right" name="noviembre" id="noviembre">
		<input type="date" name="mes11" id="mes11" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
		</div>
		</div>


		<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-2  label-align">Diciembre</label>
		<div class="col-md-6 col-sm-6">
		<input type="number" min="0" style="text-align:right" name="diciembre" id="diciembre">
		<input type="date" name="mes12" id="mes12" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
		</div>
		</div>

	</div>
</div>				

<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        	<br/>
				<input type="submit" class="btn btn-success btn-sm" value="Agregar">
				<a href="{{ url('cuotas')}}" class="btn btn-primary btn-sm">Regresar</a>
		</div>
	</div>
</div>


</form>

</div>


                
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
<!-- /page content -->

@include('contenedor.footer')    






