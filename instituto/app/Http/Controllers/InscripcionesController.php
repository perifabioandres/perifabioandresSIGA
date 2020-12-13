<?php

namespace App\Http\Controllers;

use App\Inscripciones;
use Illuminate\Http\Request;
use App\Anios;
use App\Divisiones;
use App\Cursos;
use App\Ofertas;
use App\Turnos;
use App\Alumnos;
use App\Cursadas;
use App\Personas;
use App\alumno_cursada;
use DB;

class InscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $datos= DB::table('inscripciones')
            ->join('alumnos','alumnos.id','=','inscripciones.alumno_id')
            ->join('personas','personas.id','=','alumnos.persona_id')
            ->join('cursadas','cursadas.id','=','inscripciones.cursada_id')
            ->join('anios','anios.id','=','cursadas.anio_id')
            ->join('ofertas','ofertas.id','=','cursadas.oferta_id')
            ->join('cursos','cursos.id','=','cursadas.curso_id')
            ->join('divisiones','divisiones.id','=','cursadas.division_id')
            ->join('turnos','turnos.id','=','cursadas.turno_id')
            ->select('anios.nombre as anio','ofertas.titulacion','ofertas.numero','cursos.nombre as curso','divisiones.nombre as division','turnos.nombre as turno','cursadas.plazas as plaza','inscripciones.id', 'personas.apellido as apellido', 'personas.nombre as nombre', 'personas.dni as dni')
            ->orderBy('inscripciones.id','desc')->get();
      
        //
            //dd($datos);
        return view('inscripciones.index',compact('datos'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $alumnos= DB::table('alumnos')
            ->join('personas','personas.id','=','alumnos.persona_id')
            ->select('personas.apellido as apellido', 'personas.nombre as nombre', 'personas.dni as dni','alumnos.id')
            ->orderBy('apellido','asc')->get();

         
         $cursadas= DB::table('cursadas')
            ->join('anios','anios.id','=','cursadas.anio_id')
            ->join('ofertas','ofertas.id','=','cursadas.oferta_id')
            ->join('cursos','cursos.id','=','cursadas.curso_id')
            ->join('divisiones','divisiones.id','=','cursadas.division_id')
            ->join('turnos','turnos.id','=','cursadas.turno_id')
            ->select('anios.nombre as anio','ofertas.titulacion','ofertas.numero','cursos.nombre as curso','divisiones.nombre as division','turnos.nombre as turno','cursadas.plazas as plaza','cursadas.id')
            ->orderBy('titulacion','asc')->get();
        //$alumnos = Alumnos::all();
        
        return view('inscripciones.create',compact('alumnos','cursadas'));
        
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
        
      $cursando= $request->cursada_id;
      $alumno= $request->alumno_id;
//dd($alumno);
 
        $oferta = DB::table('cursadas')//trae lo q tiene la titulacion cargada del combo
            ->join('ofertas','ofertas.id','=','cursadas.oferta_id')
            ->select('ofertas.titulacion','ofertas.id as oferta_id','cursadas.anio_id')
            ->where('cursadas.id','=',$cursando)
            ->orderBy('cursadas.id','asc')->first();

           //dd($oferta->oferta_id);//id oferta 
            //dd($oferta->anio_id);// año de la oferta 
    
        $alumnoencontrado = DB::table('alumnos')//trae lo q tiene el alumno
            ->join('inscripciones','inscripciones.alumno_id','=','alumnos.id')
            ->join('cursadas','cursadas.id','=','inscripciones.cursada_id')
            ->join('ofertas','ofertas.id','=','cursadas.oferta_id')
            ->select('alumnos.id as id_alumno','inscripciones.id as id_inscrip', 'inscripciones.cursada_id as id_cursada', 'ofertas.id as id_oferta', 'cursadas.anio_id as anio_id')
            ->where('inscripciones.alumno_id','=',$alumno)
            ->orderBy('cursadas.anio_id','asc')->get();

//dd($alumnoencontrado); 
        $existencia = Cursadas::selectRaw('SUM(plazas) AS total')
                    ->where('cursadas.id','=',$cursando)
                    ->first();
        
        $ocupadas = Cursadas::selectRaw('SUM(plazas_ocupadas) AS ocupadas')
                    ->where('cursadas.id','=',$cursando)
                    ->first();


        $todasofertas= DB::table('cursadas')
             ->select('*')
             ->orderBy('cursadas.id','asc')->get();


         $estaoferta = DB::table('cursadas')
                ->select('oferta_id','curso_id','division_id')
                ->where('cursadas.id','=',$cursando)
                ->first();    


        $ofertasolicitada= DB::table('cursadas')
             ->select('oferta_id','curso_id','division_id','plazas')
             ->where('oferta_id','=',$estaoferta->oferta_id)
             ->where('curso_id','=',$estaoferta->curso_id)
             ->where('division_id','=',$estaoferta->division_id)
             ->where('plazas','>',0)
             ->get();

//dd($ofertasolicitada);


/*
foreach($todasofertas as $encontrado){ 

    if(($encontrado->oferta_id == $ofertasolicitada->oferta_id) and ($encontrado->curso_id == $ofertasolicitada->curso_id) and ($encontrado->division_id == $ofertasolicitada->division_id) and ($existencia["Total"] >0 )){
           //dd($existencia);
          return "encontrado";
   
    }
}
*/

        $estacursando =0;

        foreach($alumnoencontrado as $encontrado){   
            if($encontrado->id_oferta == $oferta->oferta_id ){
                   $estacursando = 1;
                break;
            }else {
               // return "el alumno no se encontra cursando esa oferta";
                $estacursando = 0;
            }
        }

  

        //controlo si hay banco disponible
      
           // $cantidad=abs($lugaresdisponibles);

        $campos=[
           
            'alumno_id'=> 'required',
            'cursada_id'=> 'required',
            //'fecha'=> 'required',
            ];

        $Mensaje=["required"=>'El campo :attribute es requerido'];

        $this->validate($request, $campos, $Mensaje);

        $datosInscripcion=request()->except('_token');

    //dd($existencia['Total']);

    if($existencia["total"] > $existencia["ocupadas"]  ) {


       if($estacursando == 0){
                Inscripciones::insert($datosInscripcion);//inserto en inscripciones
                
                DB::table('cursadas')
                    ->where('cursadas.id','=',$cursando)
                    ->increment('plazas_ocupadas', 1);//descuento en plazas disponibles

                return redirect('inscripciones')->with('Mensaje','Inscripcion agregada con éxito');
            
            }else{
                return redirect('inscripciones')->with('Mensaje1','El alumo ya se encuentra inscripto en esa oferta');
            }
       
        }else{//si falla no tiene banco el curso devuelve el siguiente mensaje
            return redirect('inscripciones')->with('Mensaje1','Inscripcion no realizadas, no cuenta con plazas disponibles en ese curso/grado');
        }
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inscripciones  $inscripciones
     * @return \Illuminate\Http\Response
     */
    public function show(Inscripciones $inscripciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inscripciones  $inscripciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
//dd($id);
   $alumno = DB::table('inscripciones')
            ->join('alumnos','alumnos.id','=','inscripciones.alumno_id')
            ->select('alumnos.persona_id')
            ->where('inscripciones.id','=',$id)
            ->orderBy('inscripciones.id','asc')->first();

   $alumnos= DB::table('alumnos')
            ->join('personas','personas.id','=','alumnos.persona_id')
            ->select('personas.apellido as apellido', 'personas.nombre as nombre', 'personas.dni as dni','alumnos.id','alumnos.persona_id','personas.dni')
            ->orderBy('apellido','asc')->get();

    $cursadas= DB::table('cursadas')
            ->join('anios','anios.id','=','cursadas.anio_id')
            ->join('ofertas','ofertas.id','=','cursadas.oferta_id')
            ->join('cursos','cursos.id','=','cursadas.curso_id')
            ->join('divisiones','divisiones.id','=','cursadas.division_id')
            ->join('turnos','turnos.id','=','cursadas.turno_id')
            ->join('inscripciones','inscripciones.cursada_id','=','cursadas.id')
            ->select('anios.nombre as anio','ofertas.titulacion','ofertas.numero','cursos.nombre as curso','divisiones.nombre as division','turnos.nombre as turno','cursadas.plazas as plaza','cursadas.id')
            ->orderBy('titulacion','asc')->get();

    $inscripciones = DB::table('cursadas')
            ->join('inscripciones','inscripciones.cursada_id','=','cursadas.id')
            ->select('inscripciones.cursada_id','inscripciones.id')
            ->where('inscripciones.id','=',$id)
            ->orderBy('fecha','asc')->first();

    $fecha= DB::table('cursadas')
            ->join('inscripciones','inscripciones.cursada_id','=','cursadas.id')
            ->select('inscripciones.fecha')
            ->where('inscripciones.id','=',$id)
            ->orderBy('fecha','asc')->first();

//dd($inscripciones);
      

    return view('inscripciones.edit', compact('alumnos','cursadas','fecha','alumno','inscripciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inscripciones  $inscripciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

         $campos=[
            'alumno_id'=> 'required',
            'cursada_id'=> 'required',
            'fecha'=> 'required',
            ];

        $Mensaje=["required"=>'El campo :attribute es requerido'];

        $this->validate($request, $campos, $Mensaje);


        Inscripciones::where('id','=',$id)->update([
          "cursada_id"=>$request->input('cursada_id'),
          "alumno_id"=>$request->input('alumno_id'),
          "fecha"=>$request->input('fecha'),
        ]);


        return redirect('inscripciones')->with('Mensaje','Inscipción actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inscripciones  $inscripciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //dd($id);
        Inscripciones::destroy($id);
        return redirect('inscripciones')->with('Mensaje1','Inscipción eliminada con éxito');
    }
}
