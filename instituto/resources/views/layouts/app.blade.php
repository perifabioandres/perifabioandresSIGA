<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIGA') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script> <!--Llama a las funciones q estan el archivo scripts -->
   <!--scrip para la mascara-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('alumnos.index') }}">{{ config('app.name', 'SIGA') }}</a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(auth()->check())
                           <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Alumnos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('alumnos.index') }}">{{ __('Alumnos')}}</a>
                              <a class="dropdown-item" href="#">Asignar Curso</a>
                              <a class="dropdown-item" href="#">Inscribir Nuevo</a>
                              <a class="dropdown-item" href="#">Tutores</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Algo mas</a>
                            </div>
                          </li>

                       
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Pagos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('cuotas.index') }}">{{__('Cuotas')}}</a>
                              <a class="dropdown-item" href="{{ route('tipopagos.index') }}">{{__('Tipo de pagos')}}</a>
                              <a class="dropdown-item" href="#">Registrar Pago</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Algo mas</a>
                            </div>
                          </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Informes
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">Listado de Alumnos</a>
                              <a class="dropdown-item" href="#">Listado de Deudores</a>
                              <a class="dropdown-item" href="#">Estadistica</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Algo mas</a>
                            </div>
                         
                          </li>




                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Parametros
                              </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('paises.index') }}">{{ __('Paises') }}</a>
                              <a class="dropdown-item" href="{{ route('provincias.index') }}">{{ __('Provincias') }}</a>
                              <a class="dropdown-item" href="{{ route('departamentos.index') }}">{{ __('Departamentos') }}</a>
                              <a class="dropdown-item" href="{{ route('localidades.index') }}">{{ __('Localidades') }}</a>
                              <a class="dropdown-item" href="{{ route('documentos.index') }}">{{ __('Documentos') }}</a>
                              <a class="dropdown-item" href="{{ route('normativas.index') }}">{{ __('Normativa') }}</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Algo mas</a>
                            </div>
                          </li>

                      <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Institucional
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('anios.index') }}">{{ __('Año Academico') }}</a>
                              <a class="dropdown-item" href="{{ route('cursos.index') }}">{{ __('Curso') }}</a>
                              <a class="dropdown-item" href="{{ route('divisiones.index') }}">{{ __('División') }}</a>
                              <a class="dropdown-item" href="{{ route('colegios.index') }}">{{ __('Institución') }}</a>
                              <a class="dropdown-item" href="{{ route('modalidades.index') }}">{{ __('Modalidad') }}</a>
                              <a class="dropdown-item" href="{{ route('niveles.index') }}">{{ __('Nivel') }}</a>
                              <a class="dropdown-item" href="{{ route('turnos.index') }}">{{ __('Turno') }}</a>
                              <a class="dropdown-item" href="{{ route('ofertas.index') }}">{{ __('Oferta Educativa') }}</a>
                              <a class="dropdown-item" href="#">{{ __('Organización de la Cursada') }}</a>
                              
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Algo mas</a>
                            </div>
                          </li>


                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Utilidades
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">Auditoria</a>
                              <a class="dropdown-item" href="#">Backup</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Algo mas</a>
                            </div>
                          </li>


                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
