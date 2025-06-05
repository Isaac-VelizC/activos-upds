<?php

use App\observacion;
use Illuminate\Database\Seeder;

class ObservacionSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        observacion::create(['observacion' =>'Termino su Vida Util']);
        Observacion::create(['observacion' =>'Porque esta roto']);
        Observacion::create(['observacion' =>'Por Viejo']);
        Observacion::create(['observacion' =>'Desechado']);
    }
}
