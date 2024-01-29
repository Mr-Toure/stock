<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fonction
 *
 * @property $id
 * @property $libelle
 * @property $initial
 * @property $direction_id
 * @property $ssdirection_id
 * @property $service_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Agent[] $agents
 * @property Direction $direction
 * @property Service $service
 * @property Ssdirection $ssdirection
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Fonction extends Model
{
    
    static $rules = [
		'libelle' => 'required',
		'initial' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle','initial','direction_id','ssdirection_id','service_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agents()
    {
        return $this->hasMany('App\Models\Agent', 'fonction_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function direction()
    {
        return $this->hasOne('App\Models\Direction', 'id', 'direction_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service()
    {
        return $this->hasOne('App\Models\Service', 'id', 'service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ssdirection()
    {
        return $this->hasOne('App\Models\Ssdirection', 'id', 'ssdirection_id');
    }
    

}
