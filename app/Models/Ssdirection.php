<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ssdirection
 *
 * @property $id
 * @property $libelle
 * @property $direction_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Direction $direction
 * @property Service[] $services
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ssdirection extends Model
{

    static $rules = [
		'libelle' => 'required',
    ];

    //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle','direction_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function direction()
    {
        return $this->hasOne('App\Models\Direction', 'id', 'direction_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agents()
    {
        return $this->hasMany(Agent::class);
    }


}
