<?php

namespace App\Http\Controllers;

use App\Ocupaciones;
use Illuminate\Http\Request;

class OcupacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['ocupaciones']=Ocupaciones::all();

        return view('ocupaciones.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ocupaciones.create');
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
        $campos=['nombre'=> 'required|unique:ocupaciones,nombre|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);



        $datosOcupacion=request()->except('_token');

        Ocupaciones::insert($datosOcupacion);
        
        return redirect('ocupaciones')->with('Mensaje','Ocupación agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ocupaciones  $ocupaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Ocupaciones $ocupaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ocupaciones  $ocupaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ocupacion= Ocupaciones::findOrFail($id);

        return view('ocupaciones.edit',compact('ocupacion'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ocupaciones  $ocupaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=['nombre'=> 'required|unique:ocupaciones,nombre|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);

        
        $datosOcupacion=request()->except(['_token','_method']);
        Ocupaciones::where('id','=',$id)->update($datosOcupacion);

        return redirect('ocupaciones')->with('Mensaje','Ocupación modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ocupaciones  $ocupaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Ocupaciones::destroy($id);

        return redirect('ocupaciones')->with('Mensaje','Ocupación eliminada con éxito');
    }
}
