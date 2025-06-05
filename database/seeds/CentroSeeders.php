<?php

use App\Centro;
use Illuminate\Database\Seeder;

class CentroSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Centro::create(['centro_analisis' =>'Rectorado Regional']);
        Centro::create(['centro_analisis' =>'Vicerrectorado']);
        Centro::create(['centro_analisis' =>'Dirección Administrativa']);
        Centro::create(['centro_analisis' =>'Secretaria General']);
        Centro::create(['centro_analisis' =>'Comercial Pregrado']);
        Centro::create(['centro_analisis' =>'Comercial Postgrado']);
    }
}
