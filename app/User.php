<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id', 'name', 'email', 'password', 'admin', 'super_user', 'tipo_user', 'dep_id', 'instituto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function permiso()
    {
        return $this->hasOne(Permiso::class, 'user_id');
    }

    public function dep()
    {
        return $this->belongsTo(Departamento::class);
    }
}
