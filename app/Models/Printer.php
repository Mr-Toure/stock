<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Printer
 *
 * @property $id
 * @property $name
 * @property $reference
 * @property $marque
 * @property $type
 * @property $picture
 * @property $agent_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Agent $agent
 * @property FournituresPrinter[] $fournituresPrinters
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Printer extends Model
{

    static $rules = [
		'name' => 'required',
		'reference' => 'required',
		'marque' => 'required',
		'type' => 'required',
		'agent_id' => 'required',
    ];

    //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','reference','marque','type','picture','agent_id'];


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
        return $this->belongsToMany(fournitures::class);
    }


}
