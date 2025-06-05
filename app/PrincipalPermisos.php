<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrincipalPermisos extends Model
{
    protected $table = 'permisos';
    protected $connection = 'mysql';
    protected $primaryKey = "id";
    protected $fillable = ['user_id', 'crear_user', 'dar_baja_item', 'crear_item', 'borrar_item', 'editar_item', 'exportar', 'crear_area', 'editar_area', 'borrar_area', 'agregar_activo', 'eliminar_activo', 'editar_activo', 'crear_material'];
    

    public function usuario()
    {
        return $this->belongsTo(PrincipalUser::class, 'user_id');
    }
}
