<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    //para realizar los filtros y busquedas
	/*
	public function scopeNombres($query, $nombres){
		if ($nombres){
			return $query->where('Nombre','like',"%$nombres%");
		}
	}
	*/

	public function scopeBuscarpor($query, $tipo, $buscar){
		if (($tipo) && ($buscar)){
			return $query->where($tipo,'like',"%$buscar%");
		}
	}


	public function cursadas()
    {
        return $this->belongsToMany('App\Cursadas');
    }



    public function persona()
    {
        return $this->belongsTo('App\Personas');
    }

    
	public function tutores()
    {
        return $this->belongsToMany('App\Tutores');
    }

 	
 	public function parentescos()
    {
        return $this->belongsToMany('App\Parentescos');
    }


	public function setActivoAttribute($value)
    {
    	// dd($value);
    	 $this->attributes['activo'] = $value ? '1' : '0';
    	
    }





}
