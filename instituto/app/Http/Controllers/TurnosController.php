<?php

namespace App\Http\Controllers;

use App\Turnos;
use Illuminate\Http\Request;

class TurnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['turnos']=Turnos::paginate(3);
        return view('turnos.index', $datos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('turnos.create');
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
        $campos=['nombre'=> 'required|unique:turnos,nombre|string|max:100',
                'abreviatura'=> 'required|unique:turnos,abreviatura|string|max:100',
                'horaDesde'=> 'required|string|max:100',
                'horaHasta'=> 'required|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);


        $datosTurno=request()->except('_token');
        Turnos::insert($datosTurno);

        //return response()->json($datosModalidad);
        return redirect('turnos')->with('Mensaje','Turno agregado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function show(Turnos $turnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $turno=Turnos::findOrFail($id);

        return view('turnos.edit', compact('turno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=['nombre'=> 'required|string|max:100',
                 'horaDesde'=> 'required|string|max:100',
                 'horaHasta'=> 'required|string|max:100',
                 'abreviatura'=> 'required|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);

        $datosTurno=request()->except(['_token','_method']);
        Turnos::where('id','=',$id)->update($datosTurno);


        return redirect('turnos')->with('Mensaje','Turno modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Turnos::destroy($id);

        return redirect('turnos')->with('Mensaje','Turno eliminado con éxito');
    }
}
