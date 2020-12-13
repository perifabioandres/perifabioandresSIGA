<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;

class Provincias extends Model
{

	// define la tabla a utilizar
	protected $table = 'provincias';

	// define que todos los campos permiten entrada
	protected $fillable = [];
	
	// crea el los campos created_at y updated_at
	public $timestamps = false;


    public function pais()
    {
        return $this->belongsTo('App\Paises');
    } 

    public function departamentos()
    {
        return $this->hasMany('App\Departamentos');
    }    

}