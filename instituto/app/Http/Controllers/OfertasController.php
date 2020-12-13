<?php

namespace App\Http\Controllers;

use App\Ofertas;
use Illuminate\Http\Request;
use App\Anios;
use App\Niveles;
use App\Modalidades;
use App\Normativas;
use DB;

class OfertasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $datos= DB::table('ofertas')
                ->join('niveles','niveles.id','=','ofertas.nivel_id')
                ->join('modalidades','modalidades.id','=','ofertas.modalidad_id')
                ->join('normativas','normativas.id','=','ofertas.normativa_id')
                ->select('niveles.nombre as nombre_nivel', 'modalidades.nombre as nombre_modalidad', 'normativas.nombre as nombre_normativa', 'ofertas.titulacion', 'ofertas.numero', 'ofertas.id', 'ofertas.fecha')
                ->orderBy('titulacion','asc')
                ->paginate(7);
      
       
        return view ('ofertas.index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$anios = Anios::all();
        $niveles = Niveles::all();
        $modalidades = Modalidades::all();
        $normativas= Normativas::all();
        return view('ofertas.create', compact('niveles','modalidades','normativas'));
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
            'modalidad_id'      => 'required|string',
            'nivel_id'          => 'required|string',
            'normativa_id'      => 'required|string',
            'titulacion'        => 'required|string',
            'fecha'             => 'required|date',
            'numero'            => 'required|string'
            ];

        $Mensaje=["required"=> 'El :attribute es requirido'];

        $this->validate($request,$campos,$Mensaje);


        $datosOferta=request()->except('_token');
       
        Ofertas::insert($datosOferta);
        
        return redirect('ofertas')->with('Mensaje','Oferta agregada con éxito');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function show(Ofertas $ofertas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $niveles = Niveles::all();
        $modalidades= Modalidades::all();
        $normativas= Normativas::all();

        $oferta= Ofertas::findOrFail($id);

        return view('ofertas.edit', compact('oferta','niveles','modalidades','normativas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosOferta=request()->except(['_token','_method']);
        
        Ofertas::where('id','=',$id)->update($datosOferta);

        return redirect('ofertas')->with('Mensaje','Oferta modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ofertas::destroy($id);
        return redirect('ofertas')->with('Mensaje','Oferta eliminada con éxito');
    }
}
