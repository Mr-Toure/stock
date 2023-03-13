<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Direction
 *
 * @property $id
 * @property $libelle
 * @property $initiale
 * @property $pass
 * @property $vpass
 * @property $created_at
 * @property $updated_at
 *
 * @property Ssdirection[] $ssdirections
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Direction extends Model
{

    static $rules = [
		'libelle' => 'required',
		'initiale' => 'required',
		'pass' => 'required',
		'vpass' => 'required',
    ];

    //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle','initiale','pass','vpass'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ssdirections()
    {
        return $this->hasMany('App\Models\Ssdirection', 'direction_id', 'id');
    }


}
