<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property $id
 * @property $libelle
 * @property $ssdirection_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Agent[] $agents
 * @property Ssdirection $ssdirection
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Service extends Model
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
    protected $fillable = ['libelle','ssdirection_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ssdirection()
    {
        return $this->hasOne('App\Models\Ssdirection', 'id', 'ssdirection_id');
    }


}
