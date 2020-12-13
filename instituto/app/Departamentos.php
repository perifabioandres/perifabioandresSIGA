<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;

class Departamentos extends Model
{

	// define la tabla a utilizar
	protected $table = 'departamentos';

	// define que todos los campos permiten entrada
	protected $fillable = [];
	
	// crea el los campos created_at y updated_at
	public $timestamps = false;


    public function provincia()
    {
        return $this->belongsTo('App\Provincias');
    } 

    public function localidades()
    {
        return $this->hasMany('App\Localidades');
    }    

}