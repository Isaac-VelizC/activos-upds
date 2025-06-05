<?php

use App\Branch;
use App\User;
use Illuminate\Database\Seeder;

class MainDatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear usuario admin
        $admin = User::create([
            'name' => 'Brayan Mendez Colque',
            'email' => 'Super.User@gmail.com',
            'password' => bcrypt('SuperUser.'),
            'super_user' => true,
            'admin' => true,
            'tipo_user' => '1',
            'dep_id' => 1,
        ]);

        // Crear 3 sucursales
        $branches = [
            ['name' => 'Univ. Potosí', 'db_name' => 'departamento_po'],
            ['name' => 'Univ. Sucre', 'db_name' => 'departamento_su'],
            ['name' => 'Univ. Tarija', 'db_name' => 'departamento_tj'],
            ['name' => 'Univ. Santa Cruz', 'db_name' => 'departamento_sc'],
            ['name' => 'Univ. Oruro', 'db_name' => 'departamento_or'],
            ['name' => 'Univ. La Paz', 'db_name' => 'departamento_lp'],
            ['name' => 'Univ. Pando', 'db_name' => 'departamento_pa'],
            ['name' => 'Univ. Cochabamba', 'db_name' => 'departamento_cb'],
            ['name' => 'Univ. Beni', 'db_name' => 'departamento_be'],

            ['name' => 'Inst. Tarija', 'db_name' => 'departamento_tj_i'],
            ['name' => 'Inst. Santa Cruz', 'db_name' => 'departamento_sc_i'],
            ['name' => 'Col. Tarija', 'db_name' => 'departamento_tj_c'],
            ['name' => 'Col. Santa Cruz', 'db_name' => 'departamento_sc_c'],
            ['name' => 'Clin. Santa Cruz', 'db_name' => 'departamento_sc_cl'],
        ];
        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}
