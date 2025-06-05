<?php

use App\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create(['nombre' =>'Potosí', 'sigla' => 'PO']);
        Departamento::create(['nombre' =>'Sucre', 'sigla' => 'SU']);
        Departamento::create(['nombre' =>'Tarija', 'sigla' => 'TJ']);
        Departamento::create(['nombre' =>'La Paz', 'sigla' => 'LP']);
        Departamento::create(['nombre' =>'Cochabamba', 'sigla' => 'CB']);
        Departamento::create(['nombre' =>'Oruro', 'sigla' => 'OR']);
        Departamento::create(['nombre' =>'Santa Cruz', 'sigla' => 'SC']);
        Departamento::create(['nombre' =>'Pando', 'sigla' => 'PA']);
        Departamento::create(['nombre' =>'Beni', 'sigla' => 'BE']);
    }
}
