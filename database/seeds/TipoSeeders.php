<?php

use App\Tipos;
use Illuminate\Database\Seeder;

class TipoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipos::create(['nombre' =>'Terreno', 'codigo' => '01', 'sigla' => 'TE']);
        Tipos::create(['nombre' =>'Edificaciones', 'codigo' => '02', 'sigla' => 'ED']);
        Tipos::create(['nombre' =>'Muebles y Enseres', 'codigo' => '03', 'sigla' => 'ME']);
        Tipos::create(['nombre' =>'Muebles y Enseres para Educación', 'codigo' => '04', 'sigla' => 'MEE']);
        Tipos::create(['nombre' =>'Equipo de Computación' , 'codigo' => '05', 'sigla' => 'EC']);
        Tipos::create(['nombre' =>'Equipos Académicos' , 'codigo' => '06', 'sigla' => 'EA']);
        Tipos::create(['nombre' =>'Equipo de Seguridad y Vigilancia' , 'codigo' => '07', 'sigla' => 'ESV']);
        Tipos::create(['nombre' =>'Automotores' , 'codigo' => '08', 'sigla' => 'AUT']);
        Tipos::create(['nombre' =>'Equipo (Maquinaria y Equipo)' , 'codigo' => '09', 'sigla' => 'EQ']);
        Tipos::create(['nombre' =>'Instalaciones' , 'codigo' => '10', 'sigla' => 'INS']);
        Tipos::create(['nombre' =>'Bienes Arrendados' , 'codigo' => '11', 'sigla' => 'BA']);
        Tipos::create(['nombre' =>'Equipo de Computación para Educación' , 'codigo' => '12', 'sigla' => 'ECE']);
        Tipos::create(['nombre' =>'Herramientas' , 'codigo' => '13', 'sigla' => 'HE']);
    }
}
