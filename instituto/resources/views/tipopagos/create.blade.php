@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Agregar Tipo de Pago</h3>
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

		<li> {{ $error}} </li>

		@endforeach
	</ul>
	

</div>
@endif



<form action="{{ url('/tipopagos')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
{{ csrf_field() }}

@include('tipopagos.form', ['Modo'=>'crear'])
	
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



