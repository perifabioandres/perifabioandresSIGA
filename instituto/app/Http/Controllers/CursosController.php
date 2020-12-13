<?php

namespace App\Http\Controllers;

use App\Cursos;
use Illuminate\Http\Request;
use App\Niveles;
use App\Ofertas;
use DB;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $datos= DB::table('cursos')
            ->join('ofertas','ofertas.id','=','cursos.oferta_id')
            ->select('ofertas.titulacion','ofertas.numero','cursos.nombre','cursos.id', 'cursos.descripcion')
            ->orderBy('titulacion','asc')->get();

        return view('cursos.index', compact('datos'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ofertas = Ofertas::all();
        return view('cursos.create', compact('ofertas'));
        
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
            'nombre'=> 'required|string'
            
        ];

        $Mensaje=["required"=> 'El :attribute es requirido'];

        $this->validate($request,$campos,$Mensaje);

        $datosCurso=request()->except('_token');

        Cursos::insert($datosCurso);

        return redirect('cursos')->with('Mensaje','Curso agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show(Cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $ofertas = Ofertas::all();
       
        $curso= Cursos::findOrFail($id);

        return view('cursos.edit', compact('curso','ofertas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $datosCurso=request()->except(['_token','_method']);
        
        Cursos::where('id','=',$id)->update($datosCurso);

        return redirect('cursos')->with('Mensaje','Curso modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cursos::destroy($id);
        return redirect('cursos')->with('Mensaje','Curso eliminado con éxito');
    }
}
