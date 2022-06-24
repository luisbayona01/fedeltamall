<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tienda
 *
 * @property $idtiendas
 * @property $nombre
 * @property $logo
 * @property $tiendacategoria
 *
 * @property Admninistradorestienda[] $admninistradorestiendas
 * @property Categoriaproducto[] $categoriaproductos
 * @property Categoriatienda $categoriatienda
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tienda extends Model
{
    
    static $rules = [
		'idtiendas' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idtiendas','nombre','logo','tiendacategoria'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function admninistradorestiendas()
    {
        return $this->hasMany('App\Models\Admninistradorestienda', 'idtienda', 'idtiendas');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoriaproductos()
    {
        return $this->hasMany('App\Models\Categoriaproducto', 'idtiendacategoriap', 'idtiendas');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoriatienda()
    {
        return $this->hasOne('App\Models\Categoriatienda', 'idcategoriatienda', 'tiendacategoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'idtienda', 'idtiendas');
    }
    

}
