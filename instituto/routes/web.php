<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('auth.login');
//});


Route::get('/', 'HomeController@login')->name('home-main');

 //Route::get('/', function () {
   //  return view('plantilla');
 //});

Route::post('/get/zona', 'ZonaController@getList');

Route::resource('alumnos','AlumnosController')->middleware('auth');
Auth::routes();

Route::get('/home', 'AlumnosController@index')->name('home');



// config - Paises
Route::get('/paises', 'PaisesController@index');
Route::get('/paises/list', 'PaisesController@getList');
Route::get('/paises/create', 'PaisesController@create');
Route::post('/paises/create', 'PaisesController@store');
Route::get('/paises/edit/{id}', 'PaisesController@edit');
Route::post('/paises/edit/{id}', 'PaisesController@update');

// config - Provincias
Route::get('/provincias', 'ProvinciasController@index');
Route::get('/provincias/list', 'ProvinciasController@getList');
Route::get('/provincias/create', 'ProvinciasController@create');
Route::post('/provincias/create', 'ProvinciasController@store');
Route::get('/provincias/edit/{id}', 'ProvinciasController@edit');
Route::post('/provincias/edit/{id}', 'ProvinciasController@update');

// config - Departamentos
Route::get('/departamentos', 'DepartamentosController@index');
Route::get('/departamentos/list', 'DepartamentosController@getList');
Route::get('/departamentos/create', 'DepartamentosController@create');
Route::post('/departamentos/create', 'DepartamentosController@store');
Route::get('/departamentos/edit/{id}', 'DepartamentosController@edit');
Route::post('/departamentos/edit/{id}', 'DepartamentosController@update');

// config - Localidades
Route::get('/localidades', 'LocalidadesController@index');
Route::get('/localidades/list', 'LocalidadesController@getList');
Route::get('/localidades/create', 'LocalidadesController@create');
Route::post('/localidades/create', 'LocalidadesController@store');
Route::get('/localidades/edit/{id}', 'LocalidadesController@edit');
Route::post('/localidades/edit/{id}', 'LocalidadesController@update');



Route::resource('paises','PaisesController')->middleware('auth');
Route::resource('provincias','ProvinciasController');
Route::resource('departamentos','DepartamentosController');
Route::get('departamentos/getprovincia/{id}', 'DepartamentosController@obtenerProvincia');//uso para el combo dinamico
Route::get('departamentos/getprovincia/{id}/edit', 'DepartamentosController@obtenerProvincia');
Route::resource('localidades','LocalidadesController');
Route::get('localidades/getprovincia/{id}', 'LocalidadesController@obtenerProvincia');//uso para el combo dinamico
Route::get('localidades/getdepartamento/{id}', 'LocalidadesController@obtenerDepartamento');//uso para el combo dinamico



Route::resource('niveles','NivelesController');

Route::resource('modalidades','ModalidadesController');

Route::resource('turnos','TurnosController');

Route::resource('divisiones','DivisionesController');

Route::resource('anios','AniosController');

Route::resource('colegios','ColegiosController');

Route::resource('documentos','DocumentosController');





Route::resource('cursos','CursosController');

Route::get('alumnos/getprovincia/{id}', 'AlumnosController@obtenerProvincia');//uso para el combo dinamico

Route::get('alumnos/getdepartamento/{id}', 'AlumnosController@obtenerDepartamento');//uso para el combo dinamico

Route::get('alumnos/getlocalidad/{id}', 'AlumnosController@obtenerLocalidad');//uso para el combo dinamico



Route::resource('tipopagos','TipopagosController');

Route::resource('cuotas','CuotasController');

Route::resource('normativas','NormativasController');

Route::resource('ofertas','OfertasController');

Route::resource('cursadas','CursadasController');

Route::get('cursadas/getcurso/{id}', 'CursadasController@obtenerCurso');//uso para el combo dinamico

//Route::get('cursadas/edit/getcurso/{id}', 'CursadasController@obtenerCurso');


Route::resource('tableros','TablerosController');

Route::resource('parentescos','ParentescosController');

Route::resource('inscripciones','InscripcionesController');


Route::resource('tutores','TutoresController');
//Route::get('/tutores','TutoresController@index');
//Route::get('/tutores/create','TutoresController@create');

//Inicio Combo dinamico para tutores para geograficos
Route::get('tutores/getprovincia/{id}', 'TutoresController@obtenerProvincia');//uso para el combo dinamico

Route::get('tutores/getdepartamento/{id}', 'TutoresController@obtenerDepartamento');//uso para el combo dinamico

Route::get('tutores/getlocalidad/{id}', 'TutoresController@obtenerLocalidad');//uso para el combo dinamico

//Fin Combo dinamico para tutores 
														
Route::resource('ocupaciones','OcupacionesController');

Route::resource('detallepagos','DetallepagosController');


Route::resource('alumnoTutor','AlumnoTutorController');



