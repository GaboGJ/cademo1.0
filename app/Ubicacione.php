<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ubicacione
 *
 * @property $id
 * @property $Descripcion_ubi
 * @property $latitud_ubi
 * @property $longitud_ubi
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Empresa[] $empresas
 * @property Marcado[] $marcados
 * @property Persona[] $personas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ubicacione extends Model
{
    use SoftDeletes;

    static $rules = [
		'latitud_ubi' => 'required',
		'longitud_ubi' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Descripcion_ubi','latitud_ubi','longitud_ubi'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empresas()
    {
        return $this->hasMany('App\Empresa', 'ubi_id_emp', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function marcados()
    {
        return $this->hasMany('App\Marcado', 'ubi_id_mar', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany('App\Persona', 'ubi_id_per', 'id');
    }
    

}
