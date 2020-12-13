@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Editar Organización de Cursada falta hacer este moduloooooo falta los combox anidados
            no me toma el javascrip</h3>
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


<form action="{{ url('/cursadas/'.$cursada->id) }}" method="post">
{{ csrf_field() }}
{{ method_field('PATCH') }}

        <div class="field item form-group">
        <label for="anio_id" class="col-form-label col-md-3 col-sm-3  label-align">Año<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        <select id="anio_id" name="anio_id" class="form-control">

          @foreach ($anios as $anio)

            <option value="{{ $anio->id }}" {{$anio->id == $cursada->anio_id ? 'selected' : ''}}> {{ $anio->nombre }}</option>

          @endforeach

        </select>
        </div>
        </div>


        <div class="field item form-group">
        <label for="oferta_id" class="col-form-label col-md-3 col-sm-3  label-align">Titulación<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        <select id="oferta_id" name="oferta_id" class="form-control {{$errors->has('oferta_id')?'is-invalid':''}}">
          
                 
          @foreach ($ofertas as $oferta)

            <option value="{{ $oferta->id }}" {{$oferta->id == $cursada->oferta_id ? 'selected' : ''}}> {{ $oferta->titulacion }}</option>
            
          @endforeach
        </select>
        {!! $errors->first('oferta_id','<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>


        <div class="field item form-group">
        <label for="curso_id" class="col-form-label col-md-3 col-sm-3  label-align">Curso<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        <select id="curso_id" name="curso_id" class="form-control {{$errors->has('curso_id')?'is-invalid':''}}">
          
                  
          @foreach ($cursos as $curso)

            <option value="{{ $curso->id }}" {{$curso->id == $cursada->curso_id ? 'selected' : ''}}> {{ $curso->nombre }}</option>
            
          @endforeach

        </select>
        {!! $errors->first('curso_id','<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>


        <div class="field item form-group">
        <label for="division_id" class="col-form-label col-md-3 col-sm-3  label-align">División<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        <select id="division_id" name="division_id" class="form-control {{$errors->has('division_id')?'is-invalid':''}}">
          
          
          
          @foreach ($divisiones as $division)

            <option value="{{ $division->id }}" {{$division->id == $cursada->division_id ? 'selected' : ''}}> {{ $division->nombre }}</option>
            
          @endforeach

        </select>
        {!! $errors->first('division_id','<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>

        <div class="field item form-group">
        <label for="turnos_id" class="col-form-label col-md-3 col-sm-3  label-align">Turno<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        <select id="turno_id" name="turno_id" class="form-control {{$errors->has('turno_id')?'is-invalid':''}}">
          
          <option value="0" disabled="true" selected="true">Seleccione el turno</option>
          
          @foreach ($turnos as $turno)

            <option value="{{ $turno->id }}" {{$turno->id == $cursada->turno_id ? 'selected' : ''}}> {{ $turno->nombre }}</option>
            
          @endforeach
        
        </select>
        {!! $errors->first('turno_id','<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>


        <div class="field item form-group">
        <label for="plazas" class="col-form-label col-md-3 col-sm-3  label-align">Capacidad de Plazas<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        <input type="number" min="0" class="form-control {{$errors->has('plazas')?'is-invalid':''}}" name="plazas" id="plazas" value="{{ isset($cursada->plazas)?$cursada->plazas:old('plazas')}}">
        {!! $errors->first('plazas','<div class="invalid-feedback">:message</div>') !!}
        </div> 
        </div>





<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
          <br/>
      <input type="submit" class="btn btn-success btn-sm" value="Modificar">
      <a href="{{ url('cursadas')}}" class="btn btn-primary btn-sm">Regresar</a>
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