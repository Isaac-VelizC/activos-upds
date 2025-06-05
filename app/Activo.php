<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $table = "activos";
    protected $primaryKey = "id";
    protected $fillable = ['activo', 'tipo_id'];

}
