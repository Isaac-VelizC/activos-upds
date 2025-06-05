<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = "permisos";
    protected $primaryKey = "id";
    protected $fillable = ['user_id', 'crear_user', 'dar_baja_item', 'crear_item', 'borrar_item', 'editar_item', 'exportar', 'crear_area', 'editar_area', 'borrar_area', 'agregar_activo', 'eliminar_activo', 'editar_activo', 'crear_material'];
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
