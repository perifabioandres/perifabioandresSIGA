<?php

namespace App\Http\Controllers;

use App\Provincias;
use Illuminate\Http\Request;
use App\Paises;
use DB;

class ProvinciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $datos['provincias']=Provincias::pagiante(5);

        $datos= DB::table('provincias')
            ->join('paises','paises.id','=','provincias.pais_id')
            ->select('paises.nombre as nombre_pais','provincias.nombre','provincias.id')
            ->orderBy('nombre_pais','asc')
            ->paginate(5);

        return view('provincias.index', compact('datos'));
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
        return view('provincias.create', compact('paises'));
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
       //$datosProvincia=request()->all();
         $campos=[
            'nombre'=> 'required|unique:provincias,nombre|string'
            
        ];

        $Mensaje=["required"=> 'El :attribute es requirido'];

        $this->validate($request,$campos,$Mensaje);



        $datosProvincia=request()->except('_token');

        Provincias::insert($datosProvincia);

        return redirect('provincias')->with('Mensaje','Provincia agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provincias  $provincias
     * @return \Illuminate\Http\Response
     */
    public function show(Provincias $provincias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provincias  $provincias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //$provincia= Provincias::findOrFail($id);
        $paises = Paises::all();

        $provincia= Provincias::findOrFail($id);

        return view('provincias.edit', compact('provincia','paises'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provincias  $provincias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'nombre'=> 'required|unique:provincias,nombre|string'
            
        ];

        $Mensaje=["required"=> 'El :attribute es requirido'];

        $this->validate($request,$campos,$Mensaje);
        
        
        $datosProvincia=request()->except(['_token','_method']);
        
        Provincias::where('id','=',$id)->update($datosProvincia);

        return redirect('provincias')->with('Mensaje','Provincia modificada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provincias  $provincias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Provincias::destroy($id);
        return redirect('provincias')->with('Mensaje','Provincia eliminada con éxito');
    }
}
