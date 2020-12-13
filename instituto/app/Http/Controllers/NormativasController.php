<?php

namespace App\Http\Controllers;

use App\Normativas;
use Illuminate\Http\Request;

class NormativasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['normativas']=Normativas::all();

        return view('normativas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('normativas.create');
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
        $campos=['nombre'=> 'required|unique:normativas,nombre|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);



        $datosNormativa=request()->except('_token');

        Normativas::insert($datosNormativa);
        
        return redirect('normativas')->with('Mensaje','Normativa agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Normativas  $normativas
     * @return \Illuminate\Http\Response
     */
    public function show(Normativas $normativas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Normativas  $normativas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $normativa= Normativas::findOrFail($id);

        return view('normativas.edit',compact('normativa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Normativas  $normativas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $campos=['nombre'=> 'required|unique:normativas,nombre|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);


        
        $datosNormativa=request()->except(['_token','_method']);
        Normativas::where('id','=',$id)->update($datosNormativa);

        return redirect('normativas')->with('Mensaje','Normativa modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Normativas  $normativas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Normativas::destroy($id);

        return redirect('normativas')->with('Mensaje','Normativa eliminada con éxito');
    }
}
