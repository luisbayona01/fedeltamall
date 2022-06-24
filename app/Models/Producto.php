<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $idproductos
 * @property $nombre
 * @property $descripcion
 * @property $precio
 * @property $imagen
 * @property $idtienda
 * @property $idcategoria
 *
 * @property Categoriaproducto $categoriaproducto
 * @property Ordendecompra[] $ordendecompras
 * @property Tienda $tienda
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'idproductos' => 'required',
		'idtienda' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idproductos','nombre','descripcion','precio','imagen','idtienda','idcategoria'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoriaproducto()
    {
        return $this->hasOne('App\Models\Categoriaproducto', 'idcategoria', 'idcategoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordendecompras()
    {
        return $this->hasMany('App\Models\Ordendecompra', 'idproducto', 'idproductos');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tienda()
    {
        return $this->hasOne('App\Models\Tienda', 'idtiendas', 'idtienda');
    }
    

}
