<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anios extends Model
{
    //
    
    public function setActivoAttribute($value)
    {
    	//dd($value);
    	$this->attributes['activo'] = ($value == 'on') ? '1' : '0';

    }




}
