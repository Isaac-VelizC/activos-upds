<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = "movimientos";
    protected $primaryKey = "id";
    protected $fillable = ['item_id', 'descripcion', 'movimiento'];

    public function elemento()
    {
      return $this->belongsTo(Item::class, 'area_id');
    }
}
