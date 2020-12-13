<?php

namespace App\Http\Controllers;

use App\Departamentos;
use Illuminate\Http\Request;
use App\Provincias;
use App\Paises;
use DB;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos= DB::table('departamentos')
            ->join('provincias','provincias.id','=','departamentos.provincia_id')
            ->join('paises','paises.id','=','provincias.pais_id')
            ->select('paises.nombre as nombre_pais','provincias.nombre AS nombre_prov','provincias.id','departamentos.nombre','departamentos.id')
            ->orderBy('departamentos.nombre','asc')
            ->paginate(7);
      
       
            return view ('departamentos.index',compact('datos'));
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
        return view('departamentos.create', compact('paises','provincias'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosDepartamentos=request()->all();
         $campos=[
            'pais_id'       =>'required|string',
            'provincia_id'  => 'required|string',
            'nombre'     => 'required|unique:departamentos,nombre|string'
        
            ];

        $Mensaje=["required"=> 'El :attribute es requirido'];

        $this->validate($request,$campos,$Mensaje);


        $datosDepartamentos=request()->except('_token','pais_id');
       
        Departamentos::insert($datosDepartamentos);
        
        //return view('departamentos.index');

         return redirect('departamentos')->with('Mensaje','Departamento agregado con éxito');
        //return response()->json($datosDepartamentos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function show(Departamentos $departamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $departamento=Departamentos::findOrFail($id);
        
        $paises = Paises::all();

  
        $provincia= DB::table('departamentos')
            ->join('provincias','provincias.id','=','departamentos.provincia_id')
            ->select('provincias.nombre','provincias.id','provincias.pais_id','departamentos.nombre','departamentos.id')
            ->where('departamentos.id','=',$id)
            ->first();
    
        //$provincias= Provincias::all();
        //$provincia=Provincias::findOrFail(1);

        //$provincia = Provincias::select('nombre','id')->where('id','=',$id)->first();
        
        return view('departamentos.edit',compact('departamento','paises','provincia'));

     
       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamentos $departamentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Departamentos::destroy($id);
        return redirect('departamentos')->with('Mensaje','Departamento eliminado con éxito');
    }
}
