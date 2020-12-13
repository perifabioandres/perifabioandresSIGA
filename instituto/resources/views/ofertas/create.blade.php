@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Agregar Oferta</h3>
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

<form action="{{ url('/ofertas')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}


        <div class="field item form-group">
        <label for="nivel" class="col-form-label col-md-3 col-sm-3  label-align">Nivel<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        <select id="nivel_id" name="nivel_id" class="form-control">
          
          <option value="0" disabled="true" selected="true">Seleccione el nivel</option>
          
          @foreach ($niveles as $nivel)

            <option value="{{ $nivel->id }}"> {{ $nivel->nombre }}</option>
            
          @endforeach


        </select>
        </div>
    	</div>


        <div class="field item form-group">
        <label for="modalidad_id" class="col-form-label col-md-3 col-sm-3  label-align">Modalidad<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        <select id="modalidad_id" name="modalidad_id" class="form-control">
          
          <option value="0" disabled="true" selected="true">Seleccione la modalidad</option>
          
          @foreach ($modalidades as $modalidad)

            <option value="{{ $modalidad->id }}"> {{ $modalidad->nombre }}</option>
            
          @endforeach


        </select>
        </div>
    	</div>



        <div class="field item form-group">
        <label for="normativa_id" class="col-form-label col-md-3 col-sm-3  label-align">Tipo de Normativa<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        <select id="normativa_id" name="normativa_id" class="form-control">
          
          <option value="0" disabled="true" selected="true">Seleccione la normativa</option>
          
          @foreach ($normativas as $normativa)

            <option value="{{ $normativa->id }}"> {{ $normativa->nombre }}</option>
            
          @endforeach

        </select>
        </div>
    	 </div>

        <div class="field item form-group">
        <label for="numero" class="col-form-label col-md-3 col-sm-3  label-align">Número de Normativa<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        <input type="text" class="form-control {{$errors->has('numero')?'is-invalid':''}}" name="numero" id="numero" value="{{ isset($oferta->numero)?$oferta->numero:old('numero')}}">
        {!! $errors->first('numero','<div class="invalid-feedback">:message</div>') !!}
        </div> 
    	</div>


        <div class="field item form-group">
        <label for="fecha" class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Normativa<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        <input type="date" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" name="fecha" id="fecha" value="{{ isset($oferta->fecha)?$oferta->fecha:old('fecha')}}">
        {!! $errors->first('fecha','<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div> 


        <div class="field item form-group">
        <label for="titulacion" class="col-form-label col-md-3 col-sm-3  label-align">Titulación<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        <input type="text" class="form-control {{$errors->has('titulacion')?'is-invalid':''}}" name="titulacion" id="titulacion" value="{{ isset($oferta->titulacion)?$oferta->titulacion:old('titulacion')}}">
        {!! $errors->first('titulacion','<div class="invalid-feedback">:message</div>') !!}
        </div> 
    	</div>

		<div class="ln_solid">
		    <div class="form-group">
		        <div class="col-md-6 offset-md-3">
		        	<br/>
		        <input type="submit" class="btn btn-success btn-sm" value="Agregar">
		        <a class="btn btn-primary btn-sm" href="{{ url('ofertas') }}">Regresar</a>
		       	
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
</div>
<!-- /page content -->
@include('contenedor.footer')    

	


