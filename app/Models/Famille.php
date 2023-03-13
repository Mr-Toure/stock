<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Famille
 *
 * @property $id
 * @property $libelle
 * @property $created_at
 * @property $updated_at
 *
 * @property Typefour[] $typefours
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Famille extends Model
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
    protected $fillable = ['libelle'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function typefours()
    {
        return $this->hasMany('App\Models\Typefour', 'famille_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandes()
    {
        return $this->hasMany('App\Models\Commande', 'famille_id', 'id');
    }



}
