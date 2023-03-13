<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Typefour
 *
 * @property $id
 * @property $libelle
 * @property $famille_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Famille $famille
 * @property Fournisseur[] $fournisseurs
 * @property Fourniture[] $fournitures
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Typefour extends Model
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
    protected $fillable = ['libelle','famille_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function famille()
    {
        return $this->hasOne('App\Models\Famille', 'id', 'famille_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fournitures()
    {
        return $this->hasMany('App\Models\Fourniture', 'typefour_id', 'id');
    }


}
