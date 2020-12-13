<?php

namespace App\Http\Controllers;

use App\Parentescos;
use Illuminate\Http\Request;

class ParentescosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['parentescos']= Parentescos::all();

        return view('parentescos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parentescos.create');
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
        $campos=['nombre'=> 'required|unique:parentescos,nombre|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);

        $datosParentesco=request()->except('_token');

        Parentescos::insert($datosParentesco);
        
        return redirect('parentescos')->with('Mensaje','Parentesco agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parentescos  $parentescos
     * @return \Illuminate\Http\Response
     */
    public function show(Parentescos $parentescos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parentescos  $parentescos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $parentesco= Parentescos::findOrFail($id);

        return view('parentescos.edit',compact('parentesco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parentescos  $parentescos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=['nombre'=> 'required|unique:parentescos,nombre|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);
        
        $datosParentesco=request()->except(['_token','_method']);

        Parentescos::where('id','=',$id)->update($datosParentesco);

        return redirect('parentescos')->with('Mensaje','Parentesco modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parentescos  $parentescos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Parentescos::destroy($id);

        return redirect('parentescos')->with('Mensaje','Parentesco eliminado con éxito');
    }
}
