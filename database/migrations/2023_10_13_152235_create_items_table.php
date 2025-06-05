<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('activo_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->unsignedBigInteger('centro_id')->nullable();
            $table->unsignedBigInteger('obserb_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->string('novus', 200)->nullable();
            $table->integer('estado')->default(1);
            $table->string('image')->nullable();
            $table->String('qr_code')->nullable();
            $table->string('modelo')->nullable();
            $table->String('serie')->nullable();
            $table->String('codigo', 50);
            $table->text('descripcion', 250)->nullable();
            $table->date('fecha_compra');
            $table->dateTime('fecha_baja')->nullable();
            $table->string('user_baja')->nullable();
            $table->text('razon')->nullable();
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
        Schema::dropIfExists('items');
    }
}
