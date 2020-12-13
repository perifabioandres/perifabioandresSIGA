<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;

use View;
use Validator;
use DB;
// use Intervention\Image\ImageManagerStatic as Image;
use Yajra\Datatables\Datatables;

use App\Paises;
use App\Provincias;
use App\Departamentos;
use App\Localidades;

// use App\ConfigSys;
use Carbon\Carbon;

class LocalidadController extends Controller
{
    

    public function __construct()
    {
        $this->system = '';
    }

    public function index()
    {
        return View::make('localidad.list')->with(['system' => $this->system]);
    }

    public function getList()
    {
        
        $localidades = Localidades::all();

        foreach ($localidades as $localidad) {
            $localidad->departamento;
            $localidad->departamento->provincia;
            $localidad->departamento->provincia->pais;
        }

        return Datatables::of($localidades)->make(true);
    }

    public function create()
    {

        $paises = Paises::all();
        // $provincias = Provincia::all();
        return View::make('localidad.create')->with(['system' => $this->system, 'paises' => $paises]);
    }

    public function store(Request $request)
    {
        
        // return $request->all();      

        //-- VALIDATOR START --//
        $rules = array(
            'pais_id'           => 'required|numeric|exists:pais,id',
            'provincia_id'      => 'required|numeric|exists:provincias,id',
            'departamento_id'   => 'required|numeric|exists:departamentos,id',
            'nombre'            => 'required|min:3|max:100|unique_with:localidades,departamento_id',
            'cp'                => 'required|numeric|min:3|max:9999',
        );

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {       
          return back()->withInput()->withErrors($validator);
        }
        //-- VALIDATOR END --//

        
        $localidad = new Localidad;
        $localidad->nombre  = $request->nombre;
        $localidad->cp  = $request->cp;
        $localidad->departamento_id  = $request->departamento_id;

        if ($localidad->save()) {
            
            return redirect('/localidades')->with(['status' => 'success', 'message' => 'La Localidad fué creada.', 'icon' => 'fa-smile-o']);

        }else{
            
            return redirect('/localidades')->with(['status' => 'danger', 'message' => 'Ha ocurrido un error.', 'icon' => 'fa-frown-o']);
        
        }
    }


    public function edit($id)
    {
        
        $paises = Paises::all();
        $localidad = Localidades::find($id);
        $localidad->departamento;
        $localidad->departamento->provincia;
        $localidad->departamento->provincia->pais;
        // return $localidad;

        return View::make('localidad.edit')->with(['system' => $this->system, 'localidad' => $localidad, 'paises' => $paises]);

    }

    public function update(Request $request, $id)
    {
        
        //-- VALIDATOR START --//
        $rules = array(
            'pais_id'           => 'required|numeric|exists:pais,id',
            'provincia_id'      => 'required|numeric|exists:provincias,id',
            'departamento_id'   => 'required|numeric|exists:departamentos,id',
            'nombre'            => 'required|min:3|max:100|unique_with:localidades,departamento_id,'.$id,
            'cp'                => 'required|numeric|min:3|max:9999',
        );

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {       
          return back()->withInput()->withErrors($validator);
        }
        //-- VALIDATOR END --//


        $localidad = Localidades::find($id);
        $localidad->nombre  = $request->nombre;
        $localidad->cp  = $request->cp;
        $localidad->departamento_id  = $request->departamento_id;

        if ($localidad->save()) {

            return redirect('/localidades')->with(['status' => 'success', 'message' => 'La Localidad fué modificada.', 'icon' => 'fa-smile-o']);

        }else{
            
            return redirect('/localidades')->with(['status' => 'danger', 'message' => 'Ha ocurrido un error.', 'icon' => 'fa-frown-o']);
        
        }

    }    
}
