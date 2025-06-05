<?php

use App\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(['estado' =>'Bueno']);
        Estado::create(['estado' =>'Regular']);
        Estado::create(['estado' =>'Malo']);
        Estado::create(['estado' =>'Deteriorado']);
    }
}
