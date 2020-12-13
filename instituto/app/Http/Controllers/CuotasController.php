<?php

namespace App\Http\Controllers;

use App\Cuotas;
use Illuminate\Http\Request;
use App\Anios;
use App\Niveles;
use App\Modalidades;
use App\Ofertas;
use DB;

class CuotasController extends Controller
{
    /**
     * Display a listing of the resource...
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $datos= DB::table('cuotas')
            ->join('ofertas','ofertas.id','=','cuotas.oferta_id')
            ->join('anios', 'anios.id', '=', 'cuotas.anio_id')
            ->select('ofertas.titulacion','ofertas.numero','anios.nombre as anio','cuotas.id')
            ->orderBy('titulacion','asc')
            ->get();

        return view('cuotas.index', compact('datos'));
       
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
      
        return view('cuotas.create', compact('anios','ofertas'));
        
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
        $datosCuotas=request()->except('_token');

        Cuotas::insert($datosCuotas);

        return redirect('cuotas')->with('Mensaje','Cuotas agregadas con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuotas  $cuotas
     * @return \Illuminate\Http\Response
     */
    public function show(Cuotas $cuotas)
    {
        //
        return view('cuotas.form');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuotas  $cuotas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $anios= Anios::all();
        $ofertas = Ofertas::all();
       
        $cuota= Cuotas::findOrFail($id);

        return view('cuotas.edit', compact('cuota','ofertas','anios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuotas  $cuotas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $datosCuota=request()->except(['_token','_method']);
        
        Cuotas::where('id','=',$id)->update($datosCuota);

        return redirect('cuotas')->with('Mensaje','Cuotas modificadas con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuotas  $cuotas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cuotas::destroy($id);
        return redirect('cuotas')->with('Mensaje','Cuota eliminada con éxito');
    }
}
