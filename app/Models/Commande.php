<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Commande
 *
 * @property $id
 * @property $libelle
 * @property $date_com
 * @property $fournisseur_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Bonlivraison[] $bonlivraisons
 * @property CommandeFourniture[] $commandeFournitures
 * @property Fournisseur $fournisseur
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Commande extends Model
{

    static $rules = [
		'libelle' => 'required',
		'date_com' => 'required',
    ];

    //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle','date_com','fournisseur_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonlivraisons()
    {
        return $this->hasMany('App\Models\Bonlivraison', 'commande_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fournitures()
    {
        return $this->belongsToMany(Fourniture::class)->withPivot('qte')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fournisseur()
    {
        return $this->hasOne('App\Models\Fournisseur', 'id', 'fournisseur_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function famille()
    {
        return $this->hasOne('App\Models\Famille', 'id', 'famille_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }


}
