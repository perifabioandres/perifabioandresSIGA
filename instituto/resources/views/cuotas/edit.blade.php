@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Editar Cuotas</h3>
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


<form action="{{ url('/cuotas/'.$cuota->id) }}" method="post">
{{ csrf_field() }}
{{ method_field('PATCH') }}

<div class="field item form-group">
<label for="anio" class="col-form-label col-md-3 col-sm-3  label-align">Año Académico<span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select id="anio_id" name="anio_id" class="form-control">

    <option value="0" disabled="true" selected="true">Seleccione el año académico</option>
    @foreach ($anios as $anio)

        <option value="{{ $anio->id }}" {{$anio->id == $cuota->anio_id ? 'selected' : ''}}> {{ $anio->nombre }}</option>
        
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

        <option value="{{ $oferta->id }}" {{$oferta->id == $cuota->oferta_id ? 'selected' : ''}}> {{ $oferta->numero}} - {{$oferta->titulacion }}</option>
        
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
<input type="number" min="0" class="form-control {{$errors->has('descuento')?'is-invalid':''}}" name="descuento" id="descuento" value="{{ isset($cuota->descuento)?$cuota->descuento:old('descuento')}}">
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
<label for="cuotas" class="control-label">{{'Establezca montos de las cuotas para cada mes y su fecha de vencimiento:'}}</label>
 

    <div class="form-group row">
    <label class="control-label col-md-2 col-sm-2 "></label>
    <div class="col-md-9 col-sm-9 ">
        <div class="field item form-group">
        <label class="col-form-label col-md-2 col-sm-2  label-align">Enero</label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" style="text-align:right" name="enero" id="enero" value="{{ isset($cuota->enero)?$cuota->enero:old('enero')}}" >
        <input type="date" name="mes1" id="mes1" value="{{ isset($cuota->mes1)?$cuota->mes1:old('mes1')}}" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
        </div>
        </div>

        <div class="field item form-group">
        <label class="col-form-label col-md-2 col-sm-2  label-align">Febrero</label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" style="text-align:right" name="febrero" id="febrero"  value="{{ isset($cuota->febrero)?$cuota->febrero:old('febrero')}}">
        <input type="date" name="mes2" id="mes2" value="{{ isset($cuota->mes2)?$cuota->mes2:old('mes2')}}" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
        </div>
        </div>

        <div class="field item form-group">
        <label class="col-form-label col-md-2 col-sm-2  label-align">Marzo</label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" style="text-align:right" name="marzo" id="marzo"  value="{{ isset($cuota->marzo)?$cuota->marzo:old('marzo')}}">
        <input type="date" name="mes3" id="mes3" value="{{ isset($cuota->mes3)?$cuota->mes3:old('mes3')}}" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
        </div>
        </div>

        <div class="field item form-group">
        <label class="col-form-label col-md-2 col-sm-2  label-align">Abril</label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" style="text-align:right" name="abril" id="abril"  value="{{ isset($cuota->abril)?$cuota->abril:old('abril')}}">
        <input type="date" name="mes4" id="mes4" value="{{ isset($cuota->mes4)?$cuota->mes4:old('mes4')}}" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
        </div>
        </div>

        <div class="field item form-group">
        <label class="col-form-label col-md-2 col-sm-2  label-align">Mayo</label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" style="text-align:right" name="mayo" id="mayo" value="{{ isset($cuota->mayo)?$cuota->mayo:old('mayo')}}">
        <input type="date" name="mes5" id="mes5" value="{{ isset($cuota->mes5)?$cuota->mes5:old('mes5')}}" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
        </div>
        </div>

        <div class="field item form-group">
        <label class="col-form-label col-md-2 col-sm-2  label-align">Junio</label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" style="text-align:right" name="junio" id="junio" value="{{ isset($cuota->junio)?$cuota->junio:old('junio')}}">
        <input type="date" name="mes6" id="mes6" value="{{ isset($cuota->mes6)?$cuota->mes6:old('mes6')}}" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
        </div>
        </div>


        <div class="field item form-group">
        <label class="col-form-label col-md-2 col-sm-2  label-align">Julio</label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" style="text-align:right" name="julio" id="julio"  value="{{ isset($cuota->julio)?$cuota->julio:old('julio')}}">
        <input type="date" name="mes7" id="mes7" value="{{ isset($cuota->mes7)?$cuota->mes7:old('mes7')}}" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
        </div>
        </div>


        <div class="field item form-group">
        <label class="col-form-label col-md-2 col-sm-2  label-align">Agosto</label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" style="text-align:right" name="agosto" id="agosto"  value="{{ isset($cuota->agosto)?$cuota->agosto:old('agosto')}}">
        <input type="date" name="mes8" id="mes8" value="{{ isset($cuota->mes8)?$cuota->mes8:old('mes8')}}" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
        </div>
        </div>


        <div class="field item form-group">
        <label class="col-form-label col-md-2 col-sm-2  label-align">Septiembre</label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" style="text-align:right" name="septiembre" id="septiembre" value="{{ isset($cuota->septiembre)?$cuota->septiembre:old('septiembre')}}">
        <input type="date" name="mes9" id="mes9" value="{{ isset($cuota->mes9)?$cuota->mes9:old('mes9')}}" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
        </div>
        </div>


        <div class="field item form-group">
        <label class="col-form-label col-md-2 col-sm-2  label-align">Octubre</label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" style="text-align:right" name="octubre" id="octubre"  value="{{ isset($cuota->octubre)?$cuota->octubre:old('octubre')}}">
        <input type="date" name="mes10" id="mes10" value="{{ isset($cuota->mes10)?$cuota->mes10:old('mes10')}}" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
        </div>
        </div>


        <div class="field item form-group">
        <label class="col-form-label col-md-2 col-sm-2  label-align">Noviembre</label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" style="text-align:right" name="noviembre" id="noviembre" value="{{ isset($cuota->noviembre)?$cuota->noviembre:old('noviembre')}}">
        <input type="date" name="mes11" id="mes11" value="{{ isset($cuota->mes11)?$cuota->mes11:old('mes11')}}" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
        </div>
        </div>


        <div class="field item form-group">
        <label class="col-form-label col-md-2 col-sm-2  label-align">Diciembre</label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" style="text-align:right" name="diciembre" id="diciembre" value="{{ isset($cuota->diciembre)?$cuota->diciembre:old('diciembre')}}">
        <input type="date" name="mes12" id="mes12" value="{{ isset($cuota->mes12)?$cuota->mes12:old('mes12')}}" data-toggle="tooltip" data-placement="right" title="Fecha de vencimiento de la cuota">
        </div>
        </div>

    </div>
</div>              





<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <br/>
            <input type="submit" class="btn btn-success btn-sm" value="Modificar">
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

