<?php

namespace App\Http\Controllers;

use App\Divisiones;
use Illuminate\Http\Request;

class DivisionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['divisiones']=Divisiones::paginate(3);
        return view('divisiones.index', $datos);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('divisiones.create');
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
        $campos=['nombre'=> 'required|unique:divisiones,nombre|string|max:100',
                'abreviatura'=> 'required|unique:divisiones,abreviatura|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);


        $datosDivision=request()->except('_token');
        Divisiones::insert($datosDivision);

      
        return redirect('divisiones')->with('Mensaje','División agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Divisiones  $divisiones
     * @return \Illuminate\Http\Response
     */
    public function show(Divisiones $divisiones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Divisiones  $divisiones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $division=Divisiones::findOrFail($id);

        return view('divisiones.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Divisiones  $divisiones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=['nombre'=> 'required|string|max:100',
                'abreviatura'=> 'required|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);

        $datosDivision=request()->except(['_token','_method']);
        Divisiones::where('id','=',$id)->update($datosDivision);


        return redirect('divisiones')->with('Mensaje','División modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Divisiones  $divisiones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Divisiones::destroy($id);

        return redirect('divisiones')->with('Mensaje','División eliminada con éxito');
    }
}
