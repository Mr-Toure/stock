<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Agent
 *
 * @property $id
 * @property $name
 * @property $surname
 * @property $phone
 * @property $post
 * @property $picture
 * @property $service_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Bonreception[] $bonreceptions
 * @property Service $service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Agent extends Model
{

    static $rules = [
		'name' => 'required',
		'surname' => 'required',
    ];

    //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','surname','matricule','email','phone','post','picture','service_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonreceptions()
    {
        return $this->hasMany('App\Models\Bonreception', 'agent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }


}
