<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "areas";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'sigla', 'estado', 'encargado', 'descripcion'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
