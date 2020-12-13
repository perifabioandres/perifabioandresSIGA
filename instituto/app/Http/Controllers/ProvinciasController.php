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


// use App\ConfigSys;
use Carbon\Carbon;

class ProvinciasController extends Controller
{
    

    public function __construct()
    {
        $this->system = '';
    }

    public function index()
    {
        return View::make('provincia.list')->with(['system' => $this->system]);
    }

    public function getList()
    {
        
        $provincias = Provincias::all();

        foreach ($provincias as $provincia) {
            $provincia->pais;
        }

        return Datatables::of($provincias)->make(true);
    }

    public function create()
    {

        $paises = Paises::all();
        return View::make('provincia.create')->with(['system' => $this->system, 'paises' => $paises]);
    }

    public function store(Request $request)
    {
        
        // return $request->all();      

        //-- VALIDATOR START --//
        $rules = array(
            'pais_id'     => 'required|numeric|exists:pais,id',
            'nombre'      => 'required|min:3|max:100|unique_with:provincias,pais_id',
        );

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {       
          return back()->withInput()->withErrors($validator);
        }
        //-- VALIDATOR END --//

        
        $provincia = new Provincia;
        $provincia->nombre  = $request->nombre;
        $provincia->pais_id  = $request->pais_id;

        if ($provincia->save()) {
            
            return redirect('/provincias')->with(['status' => 'success', 'message' => 'La Provincia fué creada.', 'icon' => 'fa-smile-o']);

        }else{
            
            return redirect('/provincias')->with(['status' => 'danger', 'message' => 'Ha ocurrido un error.', 'icon' => 'fa-frown-o']);
        
        }
    }


    public function edit($id)
    {
        
        $paises = Paises::all();
        $provincia = Provincias::find($id);
        // return $provincia;

        return View::make('provincia.edit')->with(['system' => $this->system, 'provincia' => $provincia, 'paises' => $paises]);

    }

    public function update(Request $request, $id)
    {
        
        //-- VALIDATOR START --//
        $rules = array(
            'pais_id'      => 'required|numeric|exists:pais,id',
            'nombre'       => 'required|min:3|max:100|unique_with:provincias,pais_id,'.$id,           
        );

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {       
          return back()->withInput()->withErrors($validator);
        }
        //-- VALIDATOR END --//


        $provincia = Provincias::find($id);
        $provincia->nombre  = $request->nombre;
        $provincia->pais_id  = $request->pais_id;

        if ($provincia->save()) {

            return redirect('/provincias')->with(['status' => 'success', 'message' => 'La Provincia fué modificada.', 'icon' => 'fa-smile-o']);

        }else{
            
            return redirect('/provincias')->with(['status' => 'danger', 'message' => 'Ha ocurrido un error.', 'icon' => 'fa-frown-o']);
        
        }

    }    
}
