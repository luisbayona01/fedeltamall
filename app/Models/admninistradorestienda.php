<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admninistradorestienda extends Model
{   
    static $rules = [
		'nombre' => 'required',
    'correoelectronico'=>'required',
    'identificacion'=> 'required'  
    ];
    use HasFactory;
    public $timestamps = false;
    protected $table = 'admninistradorestienda';  // tabla
    protected $primaryKey = 'idadmninistradorestienda';
    protected $fillable = ['nombre', 'correoelectronico', 'idtienda', 'identificacion']; // campos de  la tabla

    

}
