<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $table = "centros";
    protected $primaryKey = "id";
    protected $fillable = ['centro_analisis'];
}
