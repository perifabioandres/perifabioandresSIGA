<?php

namespace App\Http\Controllers;

use App\Cursadas;
use Illuminate\Http\Request;
use App\Anios;
use App\Divisiones;
use App\Cursos;
use App\Ofertas;
use App\Turnos;
use DB;

class CursadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos= DB::table('cursadas')
            ->join('anios','anios.id','=','cursadas.anio_id')
            ->join('ofertas','ofertas.id','=','cursadas.oferta_id')
            ->join('cursos','cursos.id','=','cursadas.curso_id')
            ->join('divisiones','divisiones.id','=','cursadas.division_id')
            ->join('turnos','turnos.id','=','cursadas.turno_id')
            ->select('anios.nombre as anio','ofertas.titulacion','ofertas.numero','cursos.nombre as curso','divisiones.nombre as division','turnos.nombre as turno','cursadas.plazas as plaza','cursadas.id','cursadas.plazas_ocupadas as ocupadas')
            ->orderBy('cursadas.id','desc')->get();

        return view('cursadas.index', compact('datos'));
    }


    public function obtenerCurso($id){

        return Cursos::where('oferta_id','=',$id)->get();
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $anios = Anios::all();
        $ofertas = Ofertas::all();
        $cursos= Cursos::all();
        $divisiones= Divisiones::all();
        $turnos = Turnos::all();
        
      
        return view('cursadas.create', compact('anios','ofertas','cursos','divisiones','turnos'));
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
            'anio_id'       => 'required|string',
            'oferta_id'     => 'required|string',
            'curso_id'      => 'required|string',
            'division_id'   => 'required|string',
            'turno_id'      => 'required|string',
            'plazas'        => 'required'
            ];

        $Mensaje=["required"=> 'Es requerido :attribute'];

        $this->validate($request,$campos,$Mensaje);

        $datosCursada=request()->except('_token');
       
        Cursadas::insert($datosCursada);
        
        return redirect('cursadas')->with('Mensaje','Cursada agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cursadas  $cursadas
     * @return \Illuminate\Http\Response
     */
    public function show(Cursadas $cursadas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cursadas  $cursadas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $anios= Anios::all();
        $ofertas = Ofertas::all();
        $divisiones= Divisiones::all();
        $turnos = Turnos::all();
        $cursos= Cursos::all();
        
        $cursada= Cursadas::findOrFail($id);

        return view('cursadas.edit', compact('anios','ofertas','divisiones','turnos','cursos','cursada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cursadas  $cursadas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cursadas $cursadas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cursadas  $cursadas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cursadas::destroy($id);
        return redirect('cursadas')->with('Mensaje','Cursada eliminada con éxito');
    }
}
