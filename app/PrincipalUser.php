<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PrincipalUser extends model
{
    protected $table = 'users';
    protected $connection = 'mysql';
    protected $fillable = [
        'id', 'name', 'email', 'password', 'admin', 'tipo_user', 'dep_id', 'instituto',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function permiso()
    {
        return $this->hasOne(PrincipalPermisos::class, 'user_id');
    }

    public function dep()
    {
        return $this->belongsTo(Departamento::class);
    }
}
