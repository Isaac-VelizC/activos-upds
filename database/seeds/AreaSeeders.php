<?php

use App\Area;
use Illuminate\Database\Seeder;

class AreaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create(['nombre' => 'ACTIVO FIJO', 'sigla' => '01']);
        Area::create(['nombre' => 'ADMINISTRACIÓN DE EMPRESAS', 'sigla' => '02']);
        Area::create(['nombre' => 'ADQUISICIONES Y ALMACÉN', 'sigla' => '03']);
        Area::create(['nombre' => 'ARCHIVOS', 'sigla' => '04']);
        Area::create(['nombre' => 'ASESORÍA LEGAL', 'sigla' => '05']);
        Area::create(['nombre' => 'AUDITORIA', 'sigla' => '06']);
        Area::create(['nombre' => 'BIBLIOTECA', 'sigla' => '07']);
        Area::create(['nombre' => 'BIENESTAR ESTUDIANTIL', 'sigla' => '08']);
        Area::create(['nombre' => 'CAJA', 'sigla' => '09']);
        Area::create(['nombre' => 'CIENCIAS DE LA COMUNICACIÓN', 'sigla' => '10']);
        Area::create(['nombre' => 'COMERCIAL PREGRADO', 'sigla' => '11']);
        Area::create(['nombre' => 'CONTABILIDAD EMPRESARIAL', 'sigla' => '12']);
        Area::create(['nombre' => 'CONTABILIDAD Y FINANZAS', 'sigla' => '13']);
        Area::create(['nombre' => 'CONTADURÍA PUBLICA', 'sigla' => '14']);
        Area::create(['nombre' => 'DEPARTAMENTO DE RELACIONES PUBLICAS', 'sigla' => '15']);
        Area::create(['nombre' => 'DERECHO', 'sigla' => '16']);
        Area::create(['nombre' => 'DIRECCIÓN ADMINISTRATIVO FINANCIERO', 'sigla' => '17']);
        Area::create(['nombre' => 'COMERCIAL POSTGRADO', 'sigla' => '18']);
        Area::create(['nombre' => 'DIRECTORIO', 'sigla' => '19']);
        Area::create(['nombre' => 'DISEÑO GRAFICO', 'sigla' => '20']);
        Area::create(['nombre' => 'EDUCACIÓN A DISTANCIA', 'sigla' => '21']);
        Area::create(['nombre' => 'EXTENSIÓN UNIVERSITARIA', 'sigla' => '22']);
        Area::create(['nombre' => 'GESTIÓN DEL TALENTO HUMANO', 'sigla' => '23']);
        Area::create(['nombre' => 'INGENIERÍA COMERCIAL', 'sigla' => '24']);
        Area::create(['nombre' => 'INGENIERÍA EN REDES Y TELECOMUNICACIONES', 'sigla' => '25']);
        Area::create(['nombre' => 'INGENIERÍA EN SISTEMAS', 'sigla' => '26']);
        Area::create(['nombre' => 'INGENIERÍA INDUSTRIAL', 'sigla' => '27']);
        Area::create(['nombre' => 'MANTENIMIENTO', 'sigla' => '28']);
        Area::create(['nombre' => 'INGENIERÍA EN GESTIÓN PETROLERA', 'sigla' => '29']);
        Area::create(['nombre' => 'MARKETING Y PUBLICIDAD', 'sigla' => '30']);
        Area::create(['nombre' => 'MEDICINA', 'sigla' => '31']);
        Area::create(['nombre' => 'LIMPIEZA', 'sigla' => '32']);
        Area::create(['nombre' => 'PLANIFICACIÓN Y AUTOEVALUACIÓN', 'sigla' => '33']);
        Area::create(['nombre' => 'POSTGRADO', 'sigla' => '34']);
        Area::create(['nombre' => 'PSICOLOGÍA', 'sigla' => '35']);
        Area::create(['nombre' => 'PUBLICIDAD', 'sigla' => '36']);
        Area::create(['nombre' => 'RECTORADO REGIONAL', 'sigla' => '37']);
        Area::create(['nombre' => 'REGISTRO', 'sigla' => '38']);
        Area::create(['nombre' => 'RELACIONES PUBLICAS', 'sigla' => '39']);
        Area::create(['nombre' => 'SECRETARIA', 'sigla' => '40']);
        Area::create(['nombre' => 'SECRETARIA GENERAL', 'sigla' => '41']);
        Area::create(['nombre' => 'SOPORTE TÉCNICO', 'sigla' => '42']);
        Area::create(['nombre' => 'TRAMITES ACADÉMICOS', 'sigla' => '43']);
        Area::create(['nombre' => 'VICERRECTORADO ACADÉMICO', 'sigla' => '44']);
        Area::create(['nombre' => 'VICERRECTORADO ADMINISTRATIVO', 'sigla' => '45']);
        Area::create(['nombre' => 'PSICOPEDAGOGÍA', 'sigla' => '46']);
        Area::create(['nombre' => 'RELACIONES INTERNACIONALES', 'sigla' => '47']);
        Area::create(['nombre' => 'PRACTICAS PROFESIONALES', 'sigla' => '48']);
        Area::create(['nombre' => 'INVESTIGACION Y REACREDITACION', 'sigla' => '49']);

        Area::create(['nombre' =>'RECTORADO', 'sigla' => '50']);
        Area::create(['nombre' =>'SECRETARÍA RECTORADO', 'sigla' => '51']);
        Area::create(['nombre' =>'CONTABILIDAD PRUEBA', 'sigla' => '52']);
        Area::create(['nombre' =>'CONTABILIDAD FISCAL' , 'sigla' => '53']);
        Area::create(['nombre' =>'JEFATURA COMERCIAL' , 'sigla' => '54']);
        Area::create(['nombre' =>'SECRETARIA VICERRECTORADO' , 'sigla' => '55']);
        Area::create(['nombre' =>'INGENIERIA CIVIL' , 'sigla' => '56']);
        Area::create(['nombre' =>'ASESORIA PEDAGOGICA' , 'sigla' => '57']);
        Area::create(['nombre' =>'LABORATORIO DE CIVIL' , 'sigla' => '58']);
        Area::create(['nombre' =>'LABORATORIO DE SISTEMAS' , 'sigla' => '59']);
        Area::create(['nombre' =>'DATA CENTER' , 'sigla' => '60']);
        Area::create(['nombre' =>'GABINETE PSICOPEDAGOGICO' , 'sigla' => '61']);
        Area::create(['nombre' =>'PLANIFICACION Y DESARROLLO INSTITUCIONAL' , 'sigla' => '62']);
        Area::create(['nombre' =>'AULAS' , 'sigla' => '63']);
        Area::create(['nombre' =>'AUDITORIUM' , 'sigla' => '64']);
        Area::create(['nombre' =>'PORTERIA Y SEGURIDAD' , 'sigla' => '65']);
        Area::create(['nombre' =>'PASILLOS' , 'sigla' => '66']);
        Area::create(['nombre' =>'CAFETERIA' , 'sigla' => '67']);
    }
}
