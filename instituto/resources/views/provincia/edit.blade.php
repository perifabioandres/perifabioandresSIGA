@include('contenedor.header')

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Provincias</h3>
      </div>
    </div>

	<div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Modificar</h2>
            <div class="clearfix"></div>
          </div>
                  
					@if (session('status'))

              <div class="panel panel-{{session('status')}}">
                  <div class="panel-heading">
                      <i class="fa {{session('icon')}}"></i> {{session('message')}}
                  </div>     
              </div>   

          @endif

          <div class="x_content">
            <br />
            
            @if (!empty($provincia))

              <form action="//provincias/edit/{{$provincia->id}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">

              	{{ csrf_field() }}

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pais_id">Provincia</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    
                  @if(count($paises))
                      <select class="form-control" name="pais_id" required>
                          @foreach($paises as $pais)
                              <option value="{{$pais->id}}" {{ $provincia->pais_id ==  $pais->id || old('pais_id') == $pais->id ? 'selected' : '' }}>{{$pais->nombre}}</option>
                          @endforeach
                      </select>
                  @else
                      <div class="alert alert-danger">
                          No existen Paises.
                      </div>                                            
                  @endif
                  @if ($errors->has('pais_id')) <p class="help-block">{{ $errors->first('pais_id') }}</p> @endif

                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="nombre" name="nombre" class="form-control col-md-7 col-xs-12 @if ($errors->has('nombre')) parsley-error @endif" value="{{ old('nombre') ? old('nombre') : $provincia->nombre }}" autofocus required >
                    @if ($errors->has('nombre')) <ul class="parsley-errors-list filled"><li class="parsley">{{ $errors->first('nombre') }}</li></ul> @endif
                  </div>
                </div>
              
              </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <!-- <button type="submit" class="btn btn-primary">Cancel</button> -->
                    <a href="//provincias" class="btn btn-primary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Modificar</button>
                  </div>
                </div>

              </form>

            @else

              <div class="panel panel-danger">
                  <div class="panel-heading">
                      <i class="fa fa-frown-o"></i> An error occurred.
                  </div>     
              </div> 

            @endif   

          </div>
        </div>


      </div>
    </div>

  </div>
</div>
<!-- /page content -->

@include('contenedor.footer')