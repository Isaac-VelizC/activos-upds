<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = "actividads";
    protected $primaryKey = "id";
    protected $fillable = ['user_id', 'action', 'description', 'fecha'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
