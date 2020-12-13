@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Actualizar Datos Institucionales</h3>
        </div>
      
    </div>

    <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_content">
                   <div class="container">


<form action="{{ url('/colegios/'.$colegio->id)}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}	

{{ method_field('PATCH')}}


@include('colegios.form',['Modo'=>'editar'])


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


