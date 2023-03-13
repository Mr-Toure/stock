<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Instock
 *
 * @property $id
 * @property $fourniture_id
 * @property $qte
 * @property $created_at
 * @property $updated_at
 *
 * @property Fourniture $fourniture
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Instock extends Model
{

    static $rules = [
		'qte' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fourniture_id','qte'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fourniture()
    {
      return $this->belongsTo(Fourniture::class);
    }


}
