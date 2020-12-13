<?php

namespace App\Http\Controllers;

use App\Localidades;
use Illuminate\Http\Request;
use App\Paises;
use App\Provincias;
use App\Departamentos;
use DB;

class LocalidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           $datos= DB::table('localidades')
            ->join('departamentos','departamentos.id','=','localidades.departamento_id')
            ->join('provincias','provincias.id','=','departamentos.provincia_id')
            ->join('paises','paises.id','=','provincias.pais_id')
            ->select('paises.nombre as nombre_pais','provincias.nombre as nombre_provincia','provincias.id','departamentos.nombre','departamentos.id','localidades.nombre','localidades.id')
            ->orderBy('nombre','asc')
            ->paginate(7);
      
       
            return view ('localidades.index',compact('datos'));
       
    }


    public function obtenerDepartamento($id){

        return Departamentos::where('provincia_id','=',$id)->get();
     }

    
    public function obtenerProvincia($id){

        return Provincias::where('pais_id','=',$id)->get();
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $paises = Paises::all();
        $provincias= Provincias::all();
        $departamentos= Departamentos::all();
        return view('localidades.create', compact('paises','provincias','departamentos'));
        
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
        $campos=[
            'pais_id'       => 'required|string',
            'provincia_id'  => 'required|string',
            'departamento_id' => 'required|string',
            'nombre'        => 'required|string'
            ];

        $Mensaje=["required"=> 'El :attribute es requirido'];

        $this->validate($request,$campos,$Mensaje);


        $datosLocalidades=request()->except('_token','pais_id','provincia_id');
       
        Localidades::insert($datosLocalidades);
        
        return redirect('localidades')->with('Mensaje','Localidad agregada con éxito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Localidades  $localidades
     * @return \Illuminate\Http\Response
     */
    public function show(Localidades $localidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Localidades  $localidades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $localidad=Localidades::findOrFail($id);
        $departamento=Departamentos::findOrFail($id);
        $paises=Paises::findOrFail(1);
        $provincias=Provincias::findOrFail(1);
       
        return view('localidades.edit',compact('departamento','paises','provincias','localidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Localidades  $localidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Localidades $localidades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Localidades  $localidades
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Localidades::destroy($id);
        return redirect('localidades')->with('Mensaje','Localidad eliminada con éxito');
    }
}
