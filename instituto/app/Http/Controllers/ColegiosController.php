<?php

namespace App\Http\Controllers;

use App\Colegios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColegiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $datos['colegios']=Colegios::paginate(3);
        //return view('colegios.index', $datos);
        $colegio= Colegios::findOrFail(1);

        return view('colegios.show', compact('colegio'));

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('colegios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validando los campos
        $campos=[
           
            'nombre'=> 'required|string|max:100',
            'cue'=> 'required|numeric',
            'codigo'=> 'required|numeric',
            'FechaInicio'=> 'required|date',
            'cuit'=> 'required|string',
            'direccion'=> 'required|string|max:100',
            'numero'=> 'required|numeric',
            'telefono'=> 'required|numeric',
            'correo'=> 'required|email',
            'web'=> 'required|url',
            'foto'=> 'required|max:10000|mimes:jpeg,png,jpg',

        ];

        $Mensaje=["required"=>'El campo :attribute es requerido'];

        $this->validate($request, $campos, $Mensaje);

        //fin de la validacion de los campos


        $datosColegio=request()->except('_token');

        
        if($request->hasFile('Foto')){

            $datosColegio['Foto']=$request->file('Foto')->store('uploads','public');

        }

        Colegios::insert($datosColegio);

        return redirect('colegios')->with('Mensaje','Colegio agregado con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colegios  $colegios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $colegio= Colegios::findOrFail($id);

        return view('colegios.show', compact('colegio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colegios  $colegios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $colegio= Colegios::findOrFail($id);

        return view('colegios.edit', compact('colegio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colegios  $colegios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //validando los campos
        //
        $campos=[

            'nombre'=> 'required|string|max:100',
            'cue'=> 'required|numeric',
            'codigo'=> 'required|numeric',
            'FechaInicio'=> 'required|date',
            'cuit'=> 'required|string',
            'direccion'=> 'required|string|max:100',
            'numero'=> 'required|numeric',
            'telefono'=> 'required|numeric',
            'correo'=> 'required|email',
            'web'=> 'required|string',
          
            ];

          

        if($request->hasFile('foto')){

            $campos+=['foto'=> 'required|max:10000|mimes:jpeg,png,jpg'];

        }

        $Mensaje=["required"=>'El campo :attribute es requerido'];

        $this->validate($request, $campos, $Mensaje);


        $datosColegio=request()->except(['_token','_method']);
       
        if($request->hasFile('foto')){
            
            $colegio= Colegios::findOrFail($id);

            Storage::delete('public/'.$colegio->foto);

            $datosColegio['foto']=$request->file('foto')->store('uploads','public');

        }


        Colegios::where('id','=',$id)->update($datosColegio);
        return redirect('colegios')->with('Mensaje','Colegio modificado con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colegios  $colegios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $colegio= Colegios::findOrFail($id);

        if(Storage::delete('public/'.$colegio->foto)){
          Colegios::destroy($id);
        };

       return redirect('colegios')->with('Mensaje','Colegio Eliminado');
    }
}
