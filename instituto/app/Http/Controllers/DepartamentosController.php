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


// use App\ConfigSys;
use Carbon\Carbon;

class DepartamentosController extends Controller
{
    

    public function __construct()
    {
        $this->system = '';
    }

    public function index()
    {
        return View::make('departamento.list')->with(['system' => $this->system]);
    }

    public function getList()
    {
        
        $departamentos = Departamentos::all();

        foreach ($departamentos as $departamento) {
            $departamento->provincia;
            $departamento->provincia->pais;
        }

        return Datatables::of($departamentos)->make(true);
    }

    public function create()
    {

        $paises = Paises::all();
        // $provincias = Provincia::all();
        return View::make('departamento.create')->with(['system' => $this->system, 'paises' => $paises]);
    }

    public function store(Request $request)
    {
        
        // return $request->all();      

        //-- VALIDATOR START --//
        $rules = array(
            'pais_id'       => 'required|numeric|exists:pais,id',
            'provincia_id'  => 'required|numeric|exists:provincias,id',
            'nombre'        => 'required|min:3|max:100|unique_with:departamentos,provincia_id',
        );

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {       
          return back()->withInput()->withErrors($validator);
        }
        //-- VALIDATOR END --//

        
        $departamento = new Departamento;
        $departamento->nombre  = $request->nombre;
        $departamento->provincia_id  = $request->provincia_id;

        if ($departamento->save()) {
            
            return redirect('/departamentos')->with(['status' => 'success', 'message' => 'El Departamento fué creado.', 'icon' => 'fa-smile-o']);

        }else{
            
            return redirect('/departamentos')->with(['status' => 'danger', 'message' => 'Ha ocurrido un error.', 'icon' => 'fa-frown-o']);
        
        }
    }


    public function edit($id)
    {
        
        $paises = Paises::all();
        $departamento = Departamentos::find($id);
        $departamento->provincia;
        $departamento->provincia->pais;
        // return $departamento;

        return View::make('departamento.edit')->with(['system' => $this->system, 'departamento' => $departamento, 'paises' => $paises]);

    }

    public function update(Request $request, $id)
    {
        
        //-- VALIDATOR START --//
        $rules = array(
            'pais_id'       => 'required|numeric|exists:pais,id',
            'provincia_id'  => 'required|numeric|exists:provincias,id',
            'nombre'        => 'required|min:3|max:100|unique_with:departamentos,provincia_id,'.$id,
        );

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {       
          return back()->withInput()->withErrors($validator);
        }
        //-- VALIDATOR END --//


        $departamento = Departamentos::find($id);
        $departamento->nombre  = $request->nombre;
        $departamento->provincia_id  = $request->provincia_id;

        if ($departamento->save()) {

            return redirect('/departamentos')->with(['status' => 'success', 'message' => 'El Departamento fué modificado.', 'icon' => 'fa-smile-o']);

        }else{
            
            return redirect('/departamentos')->with(['status' => 'danger', 'message' => 'Ha ocurrido un error.', 'icon' => 'fa-frown-o']);
        
        }

    }    
}
