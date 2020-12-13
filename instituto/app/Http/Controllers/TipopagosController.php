<?php

namespace App\Http\Controllers;

use App\Tipopagos;
use Illuminate\Http\Request;

class TipopagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['tipopagos']=Tipopagos::paginate(5);

        return view('tipopagos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipopagos.create');
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
         $campos=['nombre'=> 'required|unique:tipopagos,nombre|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);



        $datosTipopago=request()->except('_token');

        Tipopagos::insert($datosTipopago);
        
        return redirect('tipopagos')->with('Mensaje','Tipo de pago agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipopagos  $tipopagos
     * @return \Illuminate\Http\Response
     */
    public function show(Tipopagos $tipopagos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipopagos  $tipopagos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipopago= Tipopagos::findOrFail($id);

        return view('tipopagos.edit',compact('tipopago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipopagos  $tipopagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $campos=['nombre'=> 'required|unique:paises,nombre|string|max:100'];//validacion del campo

        $Mensaje=["required"=> 'El :attribute es requirido'];//mensaje de la validacion

        $this->validate($request,$campos,$Mensaje);


        
        $datosTipopago=request()->except(['_token','_method']);
        
        Tipopagos::where('id','=',$id)->update($datosTipopago);

        return redirect('tipopagos')->with('Mensaje','Tipo de pago modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipopagos  $tipopagos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Tipopagos::destroy($id);

        return redirect('tipopagos')->with('Mensaje','Tipo de pago eliminado con éxito');
    }
}
