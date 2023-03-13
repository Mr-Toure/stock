<?php

namespace App\Models;

use App\Models\Fourniture;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bonlivraison
 *
 * @property $id
 * @property $libelle
 * @property $date_liv
 * @property $status
 * @property $commande_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property BonlivraisonFourniture[] $bonlivraisonFournitures
 * @property Commande $commande
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bonlivraison extends Model
{

    static $rules = [
		'libelle' => 'required',
		'date_liv' => 'required',
		'status' => 'required',
    ];

    //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle','date_liv','status','commande_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fournitures()
    {
        return $this->belongsToMany(Fourniture::class)->withPivot('qte', 'prixUachat')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function commande()
    {
        return $this->hasOne('App\Models\Commande', 'id', 'commande_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }


}
