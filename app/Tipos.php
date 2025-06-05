<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    
    protected $table = "tipos";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'codigo', 'sigla'];
}
