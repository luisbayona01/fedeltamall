<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Codigospromosional
 *
 * @property $idcodigospromosional
 * @property $imagenprocional
 * @property $codigo
 * @property $valordescuento
 *
 * @property Ordendecompra[] $ordendecompras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Codigospromosional extends Model
{
    
    static $rules = [
		'idcodigospromosional' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idcodigospromosional','imagenprocional','codigo','valordescuento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordendecompras()
    {
        return $this->hasMany('App\Models\Ordendecompra', 'idcodigopromo', 'idcodigospromosional');
    }
    

}
