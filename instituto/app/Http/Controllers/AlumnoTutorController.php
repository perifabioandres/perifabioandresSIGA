<?php

namespace App\Http\Controllers;

use App\AlumnoTutor;
use Illuminate\Http\Request;

class AlumnoTutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    
        // return $request->all();
//dd($request->alumno_id);

     $campos=[
           
            'persona_id'=> 'required',
            'alumno_id'=> 'required',
            'parentesco_id'=> 'required',
           
            //'foto'=> 'required|max:10000|mimes:jpeg,png,jpg',
                        
       ];

        $Mensaje=["required"=>'El campo :attribute es requerido'];

        $this->validate($request, $campos, $Mensaje);    
        
        foreach ($request->persona_id as $k => $v) {
            
            $nuevoParentesco = new AlumnoTutor;
            $nuevoParentesco->persona_id = $request->persona_id[$k];
            $nuevoParentesco->alumno_id = $request->alumno_id;
            $nuevoParentesco->parentesco_id = $request->parentesco_id[$k];
            $nuevoParentesco->save();
                
        }


      
        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AlumnoTutor  $alumnoTutor
     * @return \Illuminate\Http\Response
     */
    public function show(AlumnoTutor $alumnoTutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AlumnoTutor  $alumnoTutor
     * @return \Illuminate\Http\Response
     */
    public function edit(AlumnoTutor $alumnoTutor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AlumnoTutor  $alumnoTutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlumnoTutor $alumnoTutor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AlumnoTutor  $alumnoTutor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        AlumnoTutor::destroy($id);

        return back()->with('Mensaje','Parentesco Eliminado');
    }
}
