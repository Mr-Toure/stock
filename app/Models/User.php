<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable, LogsActivity, HasRoles ;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['name', 'email']);
    }
    protected static $ignoreChangeAttributes = ['password', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonlivraisons()
    {
        return $this->hasMany('App\Models\Bonlivraison', 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandes()
    {
        return $this->hasMany('App\Models\Commande', 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function connexions()
    {
        return $this->hasMany('App\Models\Connexion', 'user_id', 'id');
    }


}
