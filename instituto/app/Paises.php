<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;

class Paises extends Model
{

	// define la tabla a utilizar
	protected $table = 'paises';

	// define que todos los campos permiten entrada
	protected $fillable = [];
	
	// crea el los campos created_at y updated_at
	public $timestamps = false;

    public function provincias()
    {
        return $this->hasMany('App\Provincias');
    }    

}