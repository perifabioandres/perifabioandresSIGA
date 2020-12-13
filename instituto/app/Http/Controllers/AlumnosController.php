<?php

namespace App\Http\Controllers;

use App\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Paises;
use App\Provincias;
use App\Departamentos;
use App\Localidades;
use App\Documentos;
use App\Parentescos;
use App\Personas;
use App\Tutores;
use DB;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        //

        $datos= DB::table('alumnos')
            ->join('personas','personas.id','=','alumnos.persona_id')
            ->select('personas.nombre','personas.dni','personas.apellido','personas.cuil','personas.telefono','personas.correo','alumnos.id', 'alumnos.persona_id')
            ->orderBy('alumnos.id','desc')
            ->get();

        //$datos['alumnos']=Alumnos::all();

        return view('alumnos.index',compact('datos'));
    }

/* Funciones para cargar dinamicamento los combox*/
    
    public function obtenerProvincia($id){

        return Provincias::where('pais_id','=',$id)->get();
     }


    public function obtenerDepartamento($id){

        return Departamentos::where('provincia_id','=',$id)->get();
     }
  

     public function obtenerLocalidad($id){

        return Localidades::where('departamento_id','=',$id)->get();
                                  

     }


/* Fin de Funciones para cargar dinamicamento los combox*/

    
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //

         $paises = Paises::all();
         $documentos = Documentos::all();
      
         $tutores=Alumnos::all();
         $parentescos= Parentescos::all();

        return view('alumnos.create',compact('paises', 'documentos','tutores', 'parentescos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validando los campos
        
        $campos=[
           
            'dni'=> 'required|unique:personas,dni|numeric',
            'nombre'=> 'required|string|max:100',
            'apellido'=> 'required|string|max:100',
            'sexo'=> 'required|string',
            'fechanacimiento'=> 'required|date',
            'cuil'=> 'required|unique:personas,cuil|string',
            'pais_id'=>'required',
            'provincia_id'=>'required',
            'departamento_id'=>'required',
            'localidad_id'=>'required',
            'direccion'=> 'required|string',
            'telefono'=> 'required|string',
            'correo'=> 'required|email',
            //'foto'=> 'required|max:10000|mimes:jpeg,png,jpg',
                        
       ];

        $Mensaje=["required"=>'El campo :attribute es requerido'];

        $this->validate($request, $campos, $Mensaje);


        //fin de la validacion de los campos

        $nuevoPersona = new Personas;
        $nuevoPersona->dni_id = $request->dni_id;
        $nuevoPersona->dni = $request->dni;
        $nuevoPersona->nombre = $request->nombre;
        $nuevoPersona->apellido = $request->apellido;
        $nuevoPersona->sexo = $request->sexo;
        $nuevoPersona->fechanacimiento = $request->fechanacimiento;
        $nuevoPersona->cuil = $request->cuil;
        $nuevoPersona->localidad_id = $request->localidad_id;
        $nuevoPersona->direccion = $request->direccion;
        $nuevoPersona->numero = $request->numero;
        $nuevoPersona->telefono = $request->telefono;
        $nuevoPersona->correo = $request->correo;
        
        if(isset($request->activo) and ($request->activo == 'on'))
        {
            $request->activo = 1;
            $nuevoPersona->activo = $request->activo;
        }else{
            $request->activo = 0;
            $nuevoPersona->activo = $request->activo;
        }

        $nuevoPersona->save();

        $nuevoAlumno = new Alumnos;
        $nuevoAlumno->persona_id = $nuevoPersona->id;
        $nuevoAlumno->legajo = 1;
        $nuevoAlumno->save();

        return redirect('alumnos')->with('Mensaje','Alumno agregado con Éxito');

   
 

        // $datosPersona=request()->except('_token','pais_id','provincia_id', 'departamento_id','legajo','activo');
        //dd($datosPersona);
        //Personas::insert($datosPersona);
      
        //Alumnos::insert($persona_id);

        //return redirect('alumnos')->with('Mensaje','Alumno agregado con Éxito');
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $documentos = Documentos::all();
        $paises = Paises::all();
        $localidades = Localidades::all();
        $alumno= Alumnos::findOrFail($id);

        return view('alumnos.show', compact('alumno','paises','localidades','documentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
//dd($id);
        
        $parentescos= Parentescos::all();
        $documentos= Documentos::all();
        $paises = Paises::all();
        $localidades = Localidades::all();


            $parientes= DB::table('alumno_tutors')
            ->join('personas','personas.id','=','alumno_tutors.persona_id')
            ->join('alumnos','alumnos.id','=','alumno_tutors.alumno_id')
            ->join('parentescos','parentescos.id','=','alumno_tutors.parentesco_id')
            ->select('dni', 'personas.nombre as nombre_tutor', 'personas.apellido','cuil','telefono',
              'parentescos.nombre','personas.id','alumno_tutors.id as relacion')
            ->where('alumnos.persona_id','=',$id)
            ->orderBy('personas.id','desc')->get();

            $personas= DB::table('personas')
            ->select('*')
            ->where('personas.id','<>',$id)
            ->orderBy('personas.id','desc')->get();

            $alumno= DB::table('alumnos')
            ->join('personas','personas.id','=','alumnos.persona_id')
            ->select('nombre','alumnos.id as alumno_id','personas.id as persona_id','apellido','dni_id','dni','sexo','fechanacimiento','cuil','localidad_id','direccion','numero','telefono','correo','activo')
            ->where('alumnos.persona_id','=',$id)
            ->orderBy('nombre','asc')->first();

            //dd($alumno);

            $inscripciones= DB::table('alumnos')
            ->join('personas','personas.id','=','alumnos.persona_id')
            ->join('inscripciones','inscripciones.alumno_id','=','alumnos.id')
            ->join('cursadas','cursadas.id','=','inscripciones.cursada_id')
            ->join('anios','anios.id','=','cursadas.anio_id')
            ->join('ofertas','ofertas.id','=','cursadas.oferta_id')
            ->join('cursos','cursos.id','=','cursadas.curso_id')
            ->join('divisiones','divisiones.id','=','cursadas.division_id')
            ->join('turnos','turnos.id','=','cursadas.turno_id')
            ->select('anios.nombre as anio','ofertas.titulacion','ofertas.numero','cursos.nombre as curso','divisiones.nombre as division','turnos.nombre as turno','cursadas.plazas as plaza','inscripciones.id', 'personas.apellido as apellido', 'personas.nombre as nombre', 'personas.dni as dni','alumnos.id')
            ->where('alumnos.persona_id','=',$id)
            ->orderBy('titulacion','asc')->get();

   
        return view('alumnos.edit', compact('alumno','paises','localidades','documentos', 'parentescos', 'inscripciones','personas', 'parientes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($id);

         //validando los campos
 
        $campos=[
           'dni_id'=> 'required|numeric',
           'dni'=> 'required|numeric',
           'nombre'=> 'required|string|max:100',
           'apellido'=> 'required|string|max:100',
           'sexo'=> 'required|string',
           'fechanacimiento'=> 'required|date',
           'cuil'=> 'required|string',
           'pais_id'=>'required',
            //'provincia_id'=>'required',
            //'departamento_id'=>'required',
           'localidad_id'=>'required',
           'direccion'=> 'required|string',
           'numero'=> 'required|string',
            'telefono'=> 'required|string',
            'correo'=> 'required|email'
            ];

             

        $Mensaje=["required"=>'El campo :attribute es requerido'];

        $this->validate($request, $campos, $Mensaje);


        Personas::where('id','=',$id)->update([
          "dni_id"=>$request->input('dni_id'),
          "dni"=>$request->input('dni'),
          "nombre"=>$request->input('nombre'),
          "apellido"=>$request->input('apellido'),
          "sexo"=>$request->input('sexo'),
          "fechanacimiento"=>$request->input('fechanacimiento'),
          "cuil"=>$request->input('cuil'),
          "localidad_id"=>$request->input('localidad_id'),
          "direccion"=>$request->input('direccion'),
          "numero"=>$request->input('numero'),
          "telefono"=>$request->input('telefono'),
          "correo"=>$request->input('correo')
          //"activo"=>$request->input('activo')
        ]);

        //$alumno= Alumnos::findOrFail($id);
        //return view('alumnos.edit', compact('alumno'));

        return redirect('alumnos')->with('Mensaje','Alumno modificado con Éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      

        Personas::destroy($id);
        return redirect('alumnos')->with('Mensaje','Alumno Eliminado');
    }
}
