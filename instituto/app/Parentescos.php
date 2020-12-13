<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentescos extends Model
{
    //
    public function alumnos()
    {
        return $this->belongsToMany('App\Alumnos');
    }

    public function tutores()
    {
        return $this->belongsToMany('App\Tutores');
    }
}
