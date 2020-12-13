<?php

namespace App\Http\Controllers;

use App\Documentos;
use Illuminate\Http\Request;

class DocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['documentos']=Documentos::paginate(3);
        return view('documentos.index', $datos);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('documentos.create');
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
        $campos=['nombre'=> 'required|unique:documentos,nombre|string|max:100',
                'abreviatura'=> 'required|unique:documentos,abreviatura|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);


        $datosDocumento=request()->except('_token');
        Documentos::insert($datosDocumento);

      
        return redirect('documentos')->with('Mensaje','Documento agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documentos  $documentos
     * @return \Illuminate\Http\Response
     */
    public function show(Documentos $documentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documentos  $documentos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $documento=Documentos::findOrFail($id);

        return view('documentos.edit', compact('documento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documentos  $documentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=['nombre'=> 'required|string|max:100',
                'abreviatura'=> 'required|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);

        $datosDocumento=request()->except(['_token','_method']);
        Documentos::where('id','=',$id)->update($datosDocumento);


        return redirect('documentos')->with('Mensaje','Documento modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documentos  $documentos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Documentos::destroy($id);

        return redirect('documentos')->with('Mensaje','Documento eliminado con éxito');
    }
}
