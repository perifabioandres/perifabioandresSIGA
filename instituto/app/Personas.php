<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    //



	public function alumnos()
    {
        //return $this->hasOne('App\Models\Alumnos');
        return $this->hasOne('App\Alumnos');
    }

    public function tutores()
    {
        //return $this->hasOne('App\Models\Tutores');
        return $this->hasOne('App\Tutores');
    }



}
