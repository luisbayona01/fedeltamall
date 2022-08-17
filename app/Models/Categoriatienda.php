<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoriatienda
 *
 * @property $idcategoriatienda
 * @property $imagencategoria
 * @property $nombre
 *
 * @property Tienda[] $tiendas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categoriatienda extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

  

    public $timestamps = false;     
    
    protected $primaryKey = 'idcategoriatienda';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */ 
    protected $fillable = ['idcategoriatienda','imagencategoria','nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tiendas()
    {
        return $this->hasMany('App\Models\Tienda', 'tiendacategoria', 'idcategoriatienda');
    }
    

}
