<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fourniture
 *
 * @property $id
 * @property $designation
 * @property $marque
 * @property $reference
 * @property $caracteristique
 * @property $qte_seuil
 * @property $c_moyen_achat
 * @property $picture
 * @property $typefour_id
 * @property $created_at
 * @property $updated_at
 *
 * @property BonlivraisonsFourniture[] $bonlivraisonsFournitures
 * @property BonreceptionFourniture[] $bonreceptionFournitures
 * @property CommandesFourniture[] $commandesFournitures
 * @property FournituresPrinter[] $fournituresPrinters
 * @property Instock[] $instocks
 * @property Typefour $typefour
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Fourniture extends Model
{

    static $rules = [
		'designation' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['designation','marque','reference','caracteristique','qte_seuil','c_moyen_achat','picture','typefour_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonreceptions()
    {
        return $this->belongsToMany(Bonreception::class)->withPivot('qte','sent')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandes()
    {
        return $this->belongsToMany(Commande::class)->withPivot('qte')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonlivraisons()
    {
        return $this->belongsToMany(Bonlivraison::class)->withPivot('qte','prixUachat')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function printers()
    {
        return $this->belongsToMany(printer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function instock()
    {
        return $this->hasOne(Instock::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typefour()
    {
        return $this->hasOne('App\Models\Typefour', 'id', 'typefour_id');
    }


}
