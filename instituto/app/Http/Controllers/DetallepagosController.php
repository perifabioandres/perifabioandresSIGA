<?php

namespace App\Http\Controllers;

use App\Detallepagos;
use Illuminate\Http\Request;
use App\Alumnos;
use App\Personas;
use App\Cuotas;
use App\Inscripciones;
use App\Recibos;
use App\Cursadas;
use App\Tipopagos;
use DB;

class DetallepagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos= DB::table('alumnos')
            ->join('personas','personas.id','=','alumnos.persona_id')
            ->select('personas.nombre','personas.dni','personas.apellido','personas.cuil','personas.telefono','personas.correo','alumnos.id')
            ->orderBy('nombre','asc')
            ->get();
        //$datos['alumnos']=Alumnos::all();

        return view('detallepagos.index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$alumnos = Alumnos::all();
        
        //return view('detallepagos.create',compact('alumnos'));


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
        $fecha_cobro= date('Y-m-d');//optengo la fecha actual
        
        dd($request->cuota);

        dd($request->fechapago);// esto es el id de la cuota

        dd($request->cuota);// esta mostrando las cuotas osea pasa el valor del array

        $nuevoDetallepago = new Detallepagos;
        $nuevoDetallepago->alumno_id = $request->alumno_id;//este bien
        $nuevoDetallepago->monto = $request->total_venta;//este bien



        //$nuevoDetallepago->recibo_id = ?????????;//////verrrrrrrrrr
        $nuevoDetallepago->inscripcion_id = $request->alumno_id;////////ver
       
        $nuevoDetallepago->cuota_id = $request->cuota_id;//ver esteee

    //------------------Recibo---------------------
        
        $nuevoRecibo = new Recibos;
        $nuevoRecibo->fecha = $fecha_cobro;//este bien
        $nuevoRecibo->nrorecibo = $nrorecibo;//genera este campo consultando cn la BD..

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detallepagos  $detallepagos
     * @return \Illuminate\Http\Response
     */
    public function show(Detallepagos $detallepagos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detallepagos  $detallepagos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


        $tipopagos = Tipopagos::all();
        $cuotasss= Cuotas::all();
        $persona= DB::table('alumnos')
            ->join('personas','personas.id','=','alumnos.persona_id')
            ->select('personas.nombre','personas.dni','personas.apellido','personas.cuil','personas.telefono','personas.correo','alumnos.id')
            ->where('alumnos.id','=',$id)
            ->orderBy('nombre','asc')
            ->first();

//selecciona las cuotas y suma el total
       $cuotas = DB::table('cuotas')
                ->join('ofertas','ofertas.id','=','cuotas.oferta_id')
                ->join('cursadas','cursadas.oferta_id','=','ofertas.id')
                ->join('inscripciones','inscripciones.cursada_id','=','cursadas.id')
                ->join('alumnos','alumnos.id','=','inscripciones.alumno_id')
                ->select('ofertas.titulacion','cuotas.id','enero','febrero','marzo','abril','mayo','junio', 'julio', 'agosto','septiembre','octubre', 'noviembre','diciembre','mes1','mes2','mes3','mes4','mes5','mes6','mes7','mes8','mes9','mes10','mes11','mes12', DB::raw('SUM(enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre) as total'))
                ->where('alumnos.id','=',$id)
                ->groupBy('enero','febrero', 'marzo','abril','mayo','junio', 'julio', 'agosto','septiembre','octubre', 'noviembre','diciembre','mes1','mes2','mes3','mes4','mes5','mes6','mes7','mes8','mes9','mes10','mes11','mes12','cuotas.id','ofertas.titulacion')
                ->get();
//dd($total);
/*
         $detallepago= DB::table('detallepagos')
            ->join('alumnos','alumnos.id','=','detallepagos.alumno_id')
            ->join('inscripciones','inscripciones.id','=','detallepagos.inscripcion_id')
            ->join('recibos','recibos.id','=','detallepagos.recibo_id')
            ->join('cuotas','cuotas.id','=','detallepagos.cuota_id')

            ->join('cursos','cursos.id','=','cursadas.curso_id')
            ->join('divisiones','divisiones.id','=','cursadas.division_id')
            ->join('turnos','turnos.id','=','cursadas.turno_id')
            ->select('anios.nombre as anio','ofertas.titulacion','ofertas.numero','cursos.nombre as curso','divisiones.nombre as division','turnos.nombre as turno','cursadas.plazas as plaza','inscripciones.id', 'alumnos.Apellido as apellido', 'alumnos.nombre as nombre', 'alumnos.dni as dni')
            ->where('alumnos.id','=',$id)
            ->orderBy('titulacion','asc')->get();
*/

        return view('detallepagos.edit', compact('persona','cuotas','tipopagos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detallepagos  $detallepagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detallepagos $detallepagos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detallepagos  $detallepagos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detallepagos $detallepagos)
    {
        //
    }
}
