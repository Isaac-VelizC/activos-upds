<?php

use App\Permiso;
use Illuminate\Database\Seeder;

class PermisoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permiso::create([
            'user_id' => 1,
            'crear_user' => true,
            'dar_baja_item' => true,
            'crear_item' => true,
            'borrar_item' => true,
            'editar_item' => true,
            'exportar' => true,
            'crear_area' => true,
            'editar_area' => true,
            'borrar_area' => true,
            'agregar_activo' => true,
            'eliminar_activo' => true,
            'editar_activo' => true,
            'crear_material' => true,
        ]);
        Permiso::create([
            'user_id' => 2,
            'crear_user' => false,
            'dar_baja_item' => true,
            'crear_item' => true,
            'borrar_item' => true,
            'editar_item' => true,
            'exportar' => true,
            'crear_area' => true,
            'editar_area' => true,
            'borrar_area' => true,
            'agregar_activo' => true,
            'eliminar_activo' => true,
            'editar_activo' => true,
            'crear_material' => true,
        ]);
        Permiso::create([
            'user_id' => 3,
            'crear_user' => false,
            'dar_baja_item' => false,
            'crear_item' => false,
            'borrar_item' => false,
            'editar_item' => false,
            'exportar' => false,
            'crear_area' => false,
            'editar_area' => false,
            'borrar_area' => false,
            'agregar_activo' => false,
            'eliminar_activo' => false,
            'editar_activo' => false,
            'crear_material' => false,
        ]);
        
    }
}
