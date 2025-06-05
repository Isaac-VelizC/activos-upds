<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('crear_user')->default(false);
            $table->boolean('dar_baja_item')->default(false);
            $table->boolean('crear_item')->default(false);
            $table->boolean('borrar_item')->default(false);
            $table->boolean('editar_item')->default(false);
            $table->boolean('exportar')->default(false);
            $table->boolean('crear_area')->default(false);
            $table->boolean('editar_area')->default(false);
            $table->boolean('borrar_area')->default(false);
            $table->boolean('agregar_activo')->default(false);
            $table->boolean('eliminar_activo')->default(false);
            $table->boolean('editar_activo')->default(false);
            $table->boolean('crear_material')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}
