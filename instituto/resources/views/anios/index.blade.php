@include('contenedor.header')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Listado de Años Académicos</h3>
        </div>
      
    </div>

    <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_content">
<div class="container">

@if(Session::has('Mensaje'))
  <div class="alert alert-success" role="alert">
  {{Session::get('Mensaje')}}
  </div>
@endif

<a href="{{ url('anios/create')}}" class="btn btn-success">Agregar</a>
<br/>
<div class="dropdown-divider"></div>

<table id="datatable" class="table table-bordered table-hover" style="width:100%">

  <thead class="thead-light">
    <tr>
      <th>#</th>
      <th>Año Academico</th>
      <th>Fecha de Incio</th>
      <th>Fecha de Fin</th>
      <th>Acciones</th>
    </tr>
  </thead>

  <tbody>
  @foreach($anios as $ano)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{ $ano->nombre}}</td>
      <td>{{ $ano->fechaInicio}}</td>
      <td>{{ $ano->fechaFin}}</td>
      <td>

        <a class="btn btn-warning btn-sm" href="{{ url('/anios/'.$ano->id.'/edit')}}">Editar</a>

        <form method="post" action="{{ url('/anios/'.$ano->id)}}" style="display:inline">
        {{ csrf_field() }}
        {{ method_field('DELETE')}}

        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Seguro que desea Borrar');">Borrar</button>
        </form>
      </td>
  @endforeach
    </tr>

  </tbody>

</table>

</div>
                
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
<!-- /page content -->

  @include('contenedor.footer')    