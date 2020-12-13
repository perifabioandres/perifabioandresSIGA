<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;

// laravel-auditing
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Municipio extends Model implements AuditableContract
{

	use Auditable;

	// define la tabla a utilizar
	protected $table = 'municipios';

	// define que todos los campos permiten entrada
	protected $fillable = [];
	
	// crea el los campos created_at y updated_at
	public $timestamps = false;


    public function localidad()
    {
        return $this->belongsTo('App\Localidad');
    }   

}