<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartamentoSeeders::class);
        //$this->call(MainDatabaseSeeder::class);
        //$this->call(UserSeeders::class);
        $this->call(AreaSeeders::class);
        $this->call(TipoSeeders::class);
        $this->call(EstadoSeeders::class);
        $this->call(ActivoSeeders::class);
        $this->call(PermisoSeeders::class);
        $this->call(ObservacionSeeders::class);
        $this->call(CentroSeeders::class);
    }
}
