<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class observacion extends Model
{
    protected $table = "observacions";
    protected $primaryKey = "id";
    protected $fillable = ['observacion'];
}
