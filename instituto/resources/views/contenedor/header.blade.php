<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIGA! | </title>

   <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
	  <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
       

    <!-- Datatables -->
    <link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    <!-- bootstrap-progressbar -->
    <link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">



  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('alumnos.index') }}" class="site_title"><i class="fa fa-graduation-cap"></i> <span>SIGA!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>Fabio Andrés</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('tableros.index') }}">Tablero de Control</a></li>
                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Alumnos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('alumnos.index') }}">Alumnos</a></li>
                      <li><a href="form_advanced.html">Asignar Curso</a></li>
                      <li><a href="{{ route('inscripciones.index') }}">Inscripción</a></li>
                      <li><a href="{{ route('tutores.index') }}">Tutores</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-money"></i> Pagos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('cuotas.index') }}">Cuotas</a></li>
                      <li><a href="{{ route('detallepagos.index') }}">Registrar Pago</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-university"></i> Institucional <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('anios.index') }}">Año Académico</a></li>
                      <li><a href="{{ route('cursos.index') }}">Curso</a></li>
					            <li><a href="{{ route('divisiones.index') }}">División</a></li>
                      <li><a href="{{ route('colegios.index') }}">Institución</a></li>
					            <li><a href="{{ route('modalidades.index') }}">Modalidad</a></li>
                      <li><a href="{{ route('niveles.index') }}">Nivel</a></li>
					            <li><a href="{{ route('ofertas.index') }}">Oferta Educativa</a></li>
                      <li><a href="{{ route('cursadas.index') }}">Organización de Cursada</a></li>
                      <li><a href="{{ route('turnos.index') }}">Turno</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-cogs"></i> Parametros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a>Zonas Geograficas<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="{{ route('paises.index')}}">Países</a>
                            </li>
                            <li><a href="{{ route('provincias.index')}}">Provincias</a>
                            </li>
                            <li><a href="{{ route('departamentos.index')}}">Departamentos</a>
                            </li>
                            <li><a href="{{ route('localidades.index')}}">Localidades</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="{{ route('documentos.index')}}">Documentos</a>
                        </li>
                        <li><a href="{{ route('normativas.index')}}">Normativas</a>
                        </li>
                        <li><a href="{{ route('tipopagos.index')}}">Tipo de Pagos</a>
                        </li>
                        <li><a href="{{ route('parentescos.index')}}">Tipo de Parentesco</a></li>
                        <li><a href="{{ route('ocupaciones.index')}}">Tipo de Ocupaciones</a></li>
                    </ul>
                  </li> 


                  <li><a><i class="fa fa-line-chart"></i> Estadística - Informes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Listado de Alumnos</a></li>
                      <li><a href="chartjs2.html">Listado de Deudores</a></li>
                      <li><a href="morisjs.html">Estadistica</a></li>
                    </ul>
                  </li>
                  
                </ul>
              </div>
              <div class="menu_section">
                <h3>SISTEMA</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-user-plus"></i>Usuarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Roles</a></li>
                      <li><a href="fixed_footer.html">Usuarios</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-video-camera"></i>Utilidades <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Auditoria</a></li>
                      <li><a href="fixed_footer.html">Backup</a></li>
                    </ul>
                  </li>



                  <li><a><i class="fa fa-bug"></i> Agregar algo <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-thumbs-o-up"></i> Algo mas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                                  
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="/images/img.jpg" alt="">Fabio Andrés
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
                  <br/>
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <span class="badge bg-green">2020</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                            <span>2019</span>
                         
                                                  
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                            <span>2018</span>
                  
                                                               
                        </a>
                      </li>
                     
                           
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->
