@include('contenedor.header')


 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Agregar Provincia</h3>
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

				
				<form action="{{ url('/provincias') }}" class="form-horizontal" method="post" enctype="multipart/form-data" novalidate>
				{{ csrf_field() }}	

				<div class="field item form-group">
					<label for="Pais" class="col-form-label col-md-3 col-sm-3  label-align">Pais<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6">
						<select id="pais_id" name="pais_id" class="form-control">

							@foreach ($paises as $pais)

							<option value="{{ $pais->id }}"> {{ $pais->Nombre }}</option>

							@endforeach

						</select>
					</div>
				</div>

				<div class="field item form-group">
				
				<label for="nombre" class="col-form-label col-md-3 col-sm-3  label-align">Provincia<span class="required">*</span></label>
				<div class="col-md-6 col-sm-6">
				<input class="form-control {{$errors->has('nombre')?'is-invalid':'' }}" type="text" name="nombre" id="nombre" value="">

				{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}

				</div>
				</div>

			
				<div class="ln_solid">
            		<div class="form-group">
                	 <div class="col-md-6 offset-md-3">
						<br/>
					<input type="submit" class="btn btn-success btn-sm" value="Agregar">
					<a class="btn btn-primary btn-sm" href="{{ url('provincias') }}">Regresar</a>
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