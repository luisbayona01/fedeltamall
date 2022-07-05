<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ordendecompra
 *
 * @property $idordendecompra
 * @property $idproducto
 * @property $cantidad
 * @property $totalorden
 * @property $datetime
 * @property $estado
 * @property $idusuario
 * @property $idcodigopromo
 *
 * @property Codigospromosional $codigospromosional
 * @property Producto $producto
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ordendecompra extends Model
{  

    public $timestamps = false;
    protected $table = 'ordendecompra';
    static $rules = [
		'idordendecompra' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idordendecompra','idproducto','cantidad','totalorden','datetime','estado','idusuario','idcodigopromo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function codigospromosional()
    {
        return $this->hasOne('App\Models\Codigospromosional', 'idcodigospromosional', 'idcodigopromo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'idproductos', 'idproducto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'idusuario');
    }
    

}
