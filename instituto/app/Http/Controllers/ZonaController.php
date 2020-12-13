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
// use App\Municipio;

// use App\ConfigSys;
use Carbon\Carbon;

class ZonaController extends Controller
{
    

    public function __construct()
    {
        // $this->system = ConfigSys::find(1);
        // $this->system->inicio_act = Carbon::parse($this->system->company_inicio_act)->format('d/m/Y');
    }

    public function getList(Request $request)
    {
        
        // return $request->all();

        $output = null;
        
        if ($request->model != null && $request->id != null) {

            switch ($request->model) {
                case 'provincias':
                        $output = Provincias::where('pais_id',$request->id)->get();
                    break;
                case 'departamentos':
                        $output = Departamentos::where('provincia_id',$request->id)->orderBy('nombre', 'asc')->get();
                    break;
                case 'localidades':
                        $output = Localidades::where('departamento_id',$request->id)->orderBy('nombre', 'asc')->get();
                    break;
                // case 'municipios':
                //         $output = Municipio::where('localidad_id',$request->id)->orderBy('nombre', 'asc')->get();
                //     break;
            }
        }

        return $output;
    }

}