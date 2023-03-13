<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bonreception
 *
 * @property $id
 * @property $libelle
 * @property $date_recep
 * @property $status
 * @property $type
 * @property $sender
 * @property $treatBy
 * @property $treated_at
 * @property $validated_at
 * @property $common
 * @property $agent_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Agent $agent
 * @property BonreceptionFourniture[] $bonreceptionFournitures
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bonreception extends Model
{
    
    static $rules = [
		'libelle' => 'required',
		'date_recep' => 'required',
		'status' => 'required',
		'agent_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle','date_recep','status','type','sender','treatBy','treated_at','validated_at','common','agent_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function agent()
    {
        return $this->hasOne('App\Models\Agent', 'id', 'agent_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fournitures()
    {
        return $this->belongsToMany(Fourniture::class)->withPivot('qte', 'sent')->withTimestamps();
    }

    public function newDate($date){
        return new Carbon($date);
    }
    

}
