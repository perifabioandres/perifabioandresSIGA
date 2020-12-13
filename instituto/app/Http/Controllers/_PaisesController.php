<?php

namespace App\Http\Controllers;

use App\Paises;
use Illuminate\Http\Request;

class PaisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['paises']=Paises::all();

        return view('paises.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('paises.create');
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
        //$datosPais=request()->all();
        $campos=['Nombre'=> 'required|unique:paises,Nombre|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);


        $paisNuevo = new Paises;

        $paisNuevo->Nombre = $request->Nombre;

        $paisNuevo->save();
        
        return redirect('paises')->with('Mensaje','País agregado con éxito');


/*
        $datosPais=request()->except('_token');

        Paises::insert($datosPais);
        
        return redirect('paises')->with('Mensaje','País agregado con éxito');
*/


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paises  $paises
     * @return \Illuminate\Http\Response
     */
    public function show(Paises $paises)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paises  $paises
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pais= Paises::findOrFail($id);

        return view('paises.edit',compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paises  $paises
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=['Nombre'=> 'required|unique:paises,Nombre|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);


        
        $datosPais=request()->except(['_token','_method']);
        Paises::where('id','=',$id)->update($datosPais);

        return redirect('paises')->with('Mensaje','País modificado con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paises  $paises
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Paises::destroy($id);

        return redirect('paises')->with('Mensaje','País eliminado con éxito');
    }
}
