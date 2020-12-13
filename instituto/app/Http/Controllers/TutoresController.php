<?php

namespace App\Http\Controllers;

use App\Tutores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Paises;
use App\Provincias;
use App\Departamentos;
use App\Localidades;
use App\Documentos;
use App\Ocupaciones;
use App\Personas;

use DB;
    
class TutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $datos= DB::table('tutores')
            ->join('personas','personas.id','=','tutores.persona_id')
            ->select('personas.nombre','personas.dni','personas.apellido','personas.cuil','personas.telefono','personas.correo','tutores.id', 'personas.id as persona_id')
            ->orderBy('tutores.id','desc')
            ->get();
        

        return view('tutores.index',compact('datos'));
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
         $ocupaciones = Ocupaciones::all();      
     

        return view('tutores.create',compact('paises', 'documentos', 'ocupaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


        //
        //validando los campos

        $campos=[
           
            'dni'=> 'required|unique:personas,dni|numeric',
            'nombre'=> 'required|string|max:100',
            'apellido'=> 'required|string|max:100',
            'sexo'=> 'required|string',
            'fechanacimiento'=> 'required|date',
            'pais_id'=>'required',
            'provincia_id'=>'required',
            'departamento_id'=>'required',
            'localidad_id'=>'required',
            'direccion'=> 'required|string',
            'telefono'=> 'required|string',
            'correo'=> 'required|email',
        ];

        $Mensaje=["required"=>'El campo :attribute es requerido'];

        $this->validate($request, $campos, $Mensaje);

        //fin de la validacion de los campos


      // $datosTutor=request()->except('_token','pais_id','provincia_id', 'departamento_id');


        $nuevaPersona = new Personas;
        $nuevaPersona->dni_id = $request->dni_id;
        $nuevaPersona->dni = $request->dni;
        $nuevaPersona->nombre = $request->nombre;
        $nuevaPersona->apellido = $request->apellido;
        $nuevaPersona->sexo = $request->sexo;
        $nuevaPersona->fechanacimiento = $request->fechanacimiento;
        $nuevaPersona->cuil = $request->cuil;
        $nuevaPersona->localidad_id = $request->localidad_id;
        $nuevaPersona->direccion = $request->direccion;
        $nuevaPersona->numero = $request->numero;
        $nuevaPersona->telefono = $request->telefono;
        $nuevaPersona->correo = $request->correo;


        if(isset($request->activo) and $request->activo == 'on')
        {
            
            $request->activo = 1;
            $nuevaPersona->activo = $request->activo;
        }else{
            $request->activo = 0;
            $nuevaPersona->activo = $request->activo;
        }
               // dd($nuevaPersona); 
        
        $nuevaPersona->save();
        
    
            $nuevoTutor = new Tutores;
            $nuevoTutor->persona_id = $nuevaPersona->id;
            $nuevoTutor->ocupacion_id = $request->ocupacion_id;
            $nuevoTutor->save();
   
        
        
        return redirect('tutores')->with('Mensaje','Tutor agregado con Éxito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tutores  $tutores
     * @return \Illuminate\Http\Response
     */
    public function show(Tutores $tutores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tutores  $tutores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $documentos= Documentos::all();
        $paises = Paises::all();
        $localidades = Localidades::all();
        $ocupaciones = Ocupaciones::all();

        $tutor= DB::table('tutores')
            ->join('personas','personas.id','=','tutores.persona_id')
            ->select('*')
            ->where('tutores.persona_id','=',$id)
            ->orderBy('nombre','asc')->first();


        return view('tutores.edit', compact('tutor','paises','localidades','documentos', 'ocupaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tutores  $tutores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //dd($id);

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
          "correo"=>$request->input('correo'),
          //"ocupacion"=>$request->input('ocupacion')
          //"activo"=>$request->input('activo')
        ]);

        Tutores::where('persona_id','=',$id)->update([
            "ocupacion_id"=>$request->input('ocupacion_id')
        ]);

        return redirect('tutores')->with('Mensaje','Tutor modificado con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tutores  $tutores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       // dd($id);
       Personas::destroy($id);
        return redirect('tutores')->with('Mensaje','Tutor Eliminado');
    }
}
