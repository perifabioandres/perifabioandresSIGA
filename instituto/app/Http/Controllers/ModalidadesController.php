<?php

namespace App\Http\Controllers;

use App\Modalidades;
use Illuminate\Http\Request;

class ModalidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['modalidades']=Modalidades::paginate(3);
        return view('modalidades.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('modalidades.create');
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

        $campos=['nombre'=> 'required|unique:modalidades,nombre|string|max:100',
                'abreviatura'=> 'required|unique:modalidades,abreviatura|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);


        $datosModalidad=request()->except('_token');
        Modalidades::insert($datosModalidad);

        //return response()->json($datosModalidad);
        return redirect('modalidades')->with('Mensaje','Modalidad agregada con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modalidades  $modalidades
     * @return \Illuminate\Http\Response
     */
    public function show(Modalidades $modalidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modalidades  $modalidades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $modalidad=Modalidades::findOrFail($id);

        return view('modalidades.edit', compact('modalidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modalidades  $modalidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=['nombre'=> 'required|string|max:100',
                'abreviatura'=> 'required|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);

        $datosModalidad=request()->except(['_token','_method']);
        Modalidades::where('id','=',$id)->update($datosModalidad);


        return redirect('modalidades')->with('Mensaje','Modalidad modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modalidades  $modalidades
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Modalidades::destroy($id);

        return redirect('modalidades')->with('Mensaje','Modalidad eliminada con éxito');

    }
}
