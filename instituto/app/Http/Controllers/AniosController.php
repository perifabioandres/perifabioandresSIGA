<?php

namespace App\Http\Controllers;

use App\Anios;
use Illuminate\Http\Request;

class AniosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['anios']=Anios::all();
        return view('anios.index', $datos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('anios.create');
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
        $campos=['nombre'=> 'required|unique:anios,nombre|numeric',
                'fechaInicio'=> 'required|date|date_format:Y-m-d|before:fechaFin',
                'fechaFin'=> 'required|date|date_format:Y-m-d|after:fechaInicio',];//validacion del campo

            //'fecha_inicio'  => 'required|date|date_format:Y-m-d|before:fecha_fin',
            //'fecha_fin'     => 'required|date|date_format:Y-m-d|after:fecha_inicio',

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);


        $datosAno=request()->except('_token');
        //dd($datosAno);

        if(isset($datosAno['activo']) and $datosAno['activo'] == 'on')
        {
            $datosAno['activo'] = 1;

        }else{
            $datosAno['activo'] = 0;
        }



        Anios::insert($datosAno);

        //return response()->json($datosModalidad);
        return redirect('anios')->with('Mensaje','Año agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anios  $anios
     * @return \Illuminate\Http\Response
     */
    public function show(Anios $anios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anios  $anios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $ano=Anios::findOrFail($id);

        return view('anios.edit', compact('ano'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anios  $anios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=['nombre'    => 'required|numeric',
                'fechaInicio'=> 'required|date',
                'fechaFin'   => 'required|date'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);

        $datosAno=request()->except(['_token','_method']);
        
        if(isset($datosAno['activo']) and $datosAno['activo'] == 'on')
        {
            $datosAno['activo'] = 1;

        }else{
            $datosAno['activo'] = 0;
        }
        

        Anios::where('id','=',$id)->update($datosAno);


        return redirect('anios')->with('Mensaje','Año modificado con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anios  $anios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Anios::destroy($id);

        return redirect('anios')->with('Mensaje','Año eliminado con éxito');
    }
}
