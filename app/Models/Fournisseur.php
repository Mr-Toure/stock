<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fournisseur
 *
 * @property $id
 * @property $name
 * @property $town
 * @property $phone
 * @property $status
 * @property $picture
 * @property $typefour_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Commande[] $commandes
 * @property Typefour $typefour
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Fournisseur extends Model
{

    static $rules = [
		'name' => 'required',
    ];

    //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','town','phone','status','picture'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandes()
    {
        return $this->hasMany('App\Models\Commande', 'fournisseur_id', 'id');
    }


}
