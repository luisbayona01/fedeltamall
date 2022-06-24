<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoriaproducto
 *
 * @property $idcategoria
 * @property $categoria
 * @property $idtiendacategoriap
 *
 * @property Producto[] $productos
 * @property Tienda $tienda
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categoriaproducto extends Model
{
    
    static $rules = [
		'idcategoria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idcategoria','categoria','idtiendacategoriap'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'idcategoria', 'idcategoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tienda()
    {
        return $this->hasOne('App\Models\Tienda', 'idtiendas', 'idtiendacategoriap');
    }
    

}
