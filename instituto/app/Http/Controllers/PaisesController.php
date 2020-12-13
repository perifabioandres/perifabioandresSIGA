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

// use App\ConfigSys;
use Carbon\Carbon;

class PaisesController extends Controller
{
    

    public function __construct()
    {
        $this->system = '';
    }

    public function index()
    {
        return View::make('pais.list')->with(['system' => $this->system]);
    }

    public function getList()
    {
        
        $paises = Paises::all();

        return Datatables::of($paises)->make(true);
    }

    public function create()
    {

        return View::make('pais.create')->with(['system' => $this->system]);
    }

    public function store(Request $request)
    {
        
        // return $request->all();      

        //-- VALIDATOR START --//
        $rules = array(
            'nombre'             => 'required|min:3|max:100|unique:pais,nombre',
        );

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {       
          return back()->withInput()->withErrors($validator);
        }
        //-- VALIDATOR END --//

        
        $pais = new Paises;
        $pais->nombre  = $request->nombre;

        if ($pais->save()) {
            
            return redirect('/paises')->with(['status' => 'success', 'message' => 'El País fué creado.', 'icon' => 'fa-smile-o']);

        }else{
            
            return redirect('/paises')->with(['status' => 'danger', 'message' => 'Ha ocurrido un error.', 'icon' => 'fa-frown-o']);
        
        }
    }


    public function edit($id)
    {
        
        $pais = Paises::find($id);
        // return $pais;

        return View::make('pais.edit')->with(['system' => $this->system, 'pais' => $pais]);

    }

    public function update(Request $request, $id)
    {
        
        //-- VALIDATOR START --//
        $rules = array(
            'nombre'             => 'required|min:3|max:100|unique:pais,nombre,'.$id,
        );

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {       
          return back()->withInput()->withErrors($validator);
        }
        //-- VALIDATOR END --//


        $pais = Paises::find($id);
        $pais->nombre  = $request->nombre;
        
        if ($pais->save()) {

            return redirect('/paises')->with(['status' => 'success', 'message' => 'El País fué modificado.', 'icon' => 'fa-smile-o']);

        }else{
            
            return redirect('/paises')->with(['status' => 'danger', 'message' => 'Ha ocurrido un error.', 'icon' => 'fa-frown-o']);
        
        }

    }    

}
