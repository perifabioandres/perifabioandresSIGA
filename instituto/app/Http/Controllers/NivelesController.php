<?php

namespace App\Http\Controllers;

use App\Niveles;
use Illuminate\Http\Request;

class NivelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['niveles']=Niveles::paginate(3);

        return view('niveles.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('niveles.create');
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
        $campos=['nombre'=> 'required|unique:niveles,nombre|string|max:100',
                'abreviatura'=> 'required|unique:niveles,abreviatura|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);

        $datosNivel=request()->except('_token');

        Niveles::insert($datosNivel);
        
        return redirect('niveles')->with('Mensaje','Nivel agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Niveles  $niveles
     * @return \Illuminate\Http\Response
     */
    public function show(Niveles $niveles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Niveles  $niveles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $nivel=Niveles::findOrFail($id);

        return view('niveles.edit', compact('nivel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Niveles  $niveles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mensaje de error
        $campos=['nombre'=> 'required|string|max:100',
                'abreviatura'=> 'required|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);
        //fin del mensaje de error

        $datosNivel=request()->except(['_token','_method']);

        Niveles::where('id','=',$id)->update($datosNivel);
         return redirect('niveles')->with('Mensaje','Nivel modificado con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Niveles  $niveles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Niveles::destroy($id);

        return redirect('niveles')->with('Mensaje','Nivel eliminado con éxito');

    }
}
