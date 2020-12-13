<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutores extends Model
{
    //


    public function persona()
    {
        return $this->belongsTo('App\Models\Personas');
    }


	public function alumnos()
    {
        return $this->belongsToMany('App\Alumnos');
    }
    

    public function parentescos()
    {
        return $this->belongsToMany('App\Parentescos');
    }

}
