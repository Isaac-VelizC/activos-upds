<?php

use App\Activo;
use Illuminate\Database\Seeder;

class ActivoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //equipo de computacion
        Activo::create(['activo' => 'NOTEBOOK', 'tipo_id' => '5']);
        Activo::create(['activo' => 'MOCHILA', 'tipo_id' => '5']);
        Activo::create(['activo' => 'ESTABILIZADOR', 'tipo_id' => '5']);
        Activo::create(['activo' => 'MEMORIA', 'tipo_id' => '5']);
        Activo::create(['activo' => 'TARJETA', 'tipo_id' => '5']);
        Activo::create(['activo' => 'CAJA', 'tipo_id' => '5']);
        Activo::create(['activo' => 'DISCO DURO', 'tipo_id' => '5']);
        Activo::create(['activo' => 'IMPRESORA', 'tipo_id' => '5']);
        Activo::create(['activo' => 'PATCH CORD', 'tipo_id' => '5']);
        Activo::create(['activo' => 'SERVIDOR', 'tipo_id' => '5']);
        Activo::create(['activo' => 'LAPTOP', 'tipo_id' => '5']);
        Activo::create(['activo' => 'TECLADO', 'tipo_id' => '5']);
        Activo::create(['activo' => 'MOUSE', 'tipo_id' => '5']);
        Activo::create(['activo' => 'BIOMÉTRICO', 'tipo_id' => '5']);
        Activo::create(['activo' => 'LECTOR', 'tipo_id' => '5']);
        Activo::create(['activo' => 'APC', 'tipo_id' => '5']);
        Activo::create(['activo' => 'BATERÍA', 'tipo_id' => '5']);
        Activo::create(['activo' => 'GUÍAS RACK', 'tipo_id' => '5']);
        Activo::create(['activo' => 'PCS ADAPTER', 'tipo_id' => '5']);
        Activo::create(['activo' => 'PROCESADOR', 'tipo_id' => '5']);
        Activo::create(['activo' => 'MONITOR', 'tipo_id' => '5']);
        Activo::create(['activo' => 'CASE', 'tipo_id' => '5']);
        Activo::create(['activo' => 'PARLANTE', 'tipo_id' => '5']);
        Activo::create(['activo' => 'PROYECTOR', 'tipo_id' => '5']);
        Activo::create(['activo' => 'GRABADOR', 'tipo_id' => '5']);
        Activo::create(['activo' => 'CAMARA', 'tipo_id' => '5']);
        Activo::create(['activo' => 'FLASH', 'tipo_id' => '5']);
        Activo::create(['activo' => 'DATA', 'tipo_id' => '5']);
        Activo::create(['activo' => 'REPRODUCTOR DE DISCO', 'tipo_id' => '5']);
        Activo::create(['activo' => 'CELULAR', 'tipo_id' => '5']);
        Activo::create(['activo' => 'AURICULARES', 'tipo_id' => '5']);

        //Equipos de seguridad y vigilancia
        Activo::create(['activo' => 'EXTINTOR', 'tipo_id' => '7']);
        Activo::create(['activo' => 'CAMARA', 'tipo_id' => '7']);
        Activo::create(['activo' => 'MOLINETE', 'tipo_id' => '7']);
        Activo::create(['activo' => 'BIOMETRICO', 'tipo_id' => '7']);
        Activo::create(['activo' => 'DVR', 'tipo_id' => '7']);
        Activo::create(['activo' => 'FUENTE', 'tipo_id' => '7']);
        //herramientas
        Activo::create(['activo' => 'TESTER', 'tipo_id' => '13']);
        Activo::create(['activo' => 'ALICATES', 'tipo_id' => '13']);
        Activo::create(['activo' => 'COMBOS', 'tipo_id' => '13']);
        Activo::create(['activo' => 'TENAZAS', 'tipo_id' => '13']);
        Activo::create(['activo' => 'BREAKER', 'tipo_id' => '13']);
        Activo::create(['activo' => 'CAJA', 'tipo_id' => '13']);
        Activo::create(['activo' => 'DESARMADORES', 'tipo_id' => '13']);
        Activo::create(['activo' => 'MINIPINZA', 'tipo_id' => '13']);
        Activo::create(['activo' => 'CARRETILLA', 'tipo_id' => '13']);
        Activo::create(['activo' => 'CORTADOR', 'tipo_id' => '13']);
        Activo::create(['activo' => 'LLAVE', 'tipo_id' => '13']);
        Activo::create(['activo' => 'MARTILLOS', 'tipo_id' => '13']);
        //Equipos de Computación para Educación
        Activo::create(['activo' => 'CAMARA', 'tipo_id' => '12']);
        Activo::create(['activo' => 'CUALIFICADOR', 'tipo_id' => '12']);
        Activo::create(['activo' => 'ROUTER', 'tipo_id' => '12']);
        Activo::create(['activo' => 'TELEVISIÓN', 'tipo_id' => '12']);
        Activo::create(['activo' => 'RADIO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'ACCESORIOS', 'tipo_id' => '12']);
        Activo::create(['activo' => 'KIT DE MONTAJE', 'tipo_id' => '12']);
        Activo::create(['activo' => 'PIZARRA', 'tipo_id' => '12']);
        Activo::create(['activo' => 'FAX', 'tipo_id' => '12']);
        Activo::create(['activo' => 'CENTRAL', 'tipo_id' => '12']);
        Activo::create(['activo' => 'TELEFONO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'AMOLADORA', 'tipo_id' => '12']);
        Activo::create(['activo' => 'MEMORIA', 'tipo_id' => '12']);
        Activo::create(['activo' => 'DVR', 'tipo_id' => '12']);
        Activo::create(['activo' => 'BALUM', 'tipo_id' => '12']);
        Activo::create(['activo' => 'MARTILLO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'PESÓN', 'tipo_id' => '12']);
        Activo::create(['activo' => 'PENETRÓMETRO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'TAMIZADOR', 'tipo_id' => '12']);
        Activo::create(['activo' => 'BALANZA', 'tipo_id' => '12']);
        Activo::create(['activo' => 'TAMICES', 'tipo_id' => '12']);
        Activo::create(['activo' => 'BANCO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'CONO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'CAJA', 'tipo_id' => '12']);
        Activo::create(['activo' => 'LIMITE', 'tipo_id' => '12']);
        Activo::create(['activo' => 'MOLDE', 'tipo_id' => '12']);
        Activo::create(['activo' => 'HORNO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'CISCO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'FUENTE', 'tipo_id' => '12']);
        Activo::create(['activo' => 'PROYECTOR', 'tipo_id' => '12']);
        Activo::create(['activo' => 'LAMPARAS', 'tipo_id' => '12']);
        Activo::create(['activo' => 'SERVIDOR', 'tipo_id' => '12']);
        Activo::create(['activo' => 'ESTACIÓN', 'tipo_id' => '12']);
        Activo::create(['activo' => 'PARLANTE', 'tipo_id' => '12']);
        Activo::create(['activo' => 'MICRÓFONO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'CONSOLA', 'tipo_id' => '12']);
        Activo::create(['activo' => 'CABLE', 'tipo_id' => '12']);
        Activo::create(['activo' => 'EQUIPO ENERGIZER', 'tipo_id' => '12']);
        Activo::create(['activo' => 'PUNTERO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'ACCES POINT', 'tipo_id' => '12']);
        Activo::create(['activo' => 'ORDENADOR DE CABLES', 'tipo_id' => '12']);
        Activo::create(['activo' => 'PATCH PANEL', 'tipo_id' => '12']);
        Activo::create(['activo' => 'REGLETA', 'tipo_id' => '12']);
        Activo::create(['activo' => 'SWITCH', 'tipo_id' => '12']);
        Activo::create(['activo' => 'MIKROTIK CLOUD CORE', 'tipo_id' => '12']);
        Activo::create(['activo' => 'BATERÍA', 'tipo_id' => '12']);
        Activo::create(['activo' => 'FUENTE DE PODER', 'tipo_id' => '12']);
        Activo::create(['activo' => 'CARGADOR', 'tipo_id' => '12']);
        Activo::create(['activo' => 'RELOJ', 'tipo_id' => '12']);
        Activo::create(['activo' => 'PRENSA', 'tipo_id' => '12']);
        Activo::create(['activo' => 'DISPOSITIVO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'ESCLORÓMETRO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'RACK', 'tipo_id' => '12']);
        Activo::create(['activo' => 'COOLERS', 'tipo_id' => '12']);
        Activo::create(['activo' => 'CORTAPICOS', 'tipo_id' => '12']);
        Activo::create(['activo' => 'OSMO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'SOFTBOX', 'tipo_id' => '12']);
        Activo::create(['activo' => 'LUZ', 'tipo_id' => '12']);
        Activo::create(['activo' => 'DISPARADOR', 'tipo_id' => '12']);
        Activo::create(['activo' => 'REBOTADOR', 'tipo_id' => '12']);
        Activo::create(['activo' => 'BRAZO', 'tipo_id' => '12']);
        Activo::create(['activo' => 'PORTAFONDOS', 'tipo_id' => '12']);
        Activo::create(['activo' => 'TRIPIE', 'tipo_id' => '12']);
        Activo::create(['activo' => 'FOTOCOPIADORA', 'tipo_id' => '12']);
        Activo::create(['activo' => 'CAMARA FILMADORA', 'tipo_id' => '12']);
        //Equipos academicos
        Activo::create(['activo' => 'ROBOT', 'tipo_id' => '6']);
        Activo::create(['activo' => 'KIT DE EXPANSIÓN', 'tipo_id' => '6']);
        Activo::create(['activo' => 'CONTROLADOR', 'tipo_id' => '6']);
        Activo::create(['activo' => 'KIT ARDUINO', 'tipo_id' => '6']);
        Activo::create(['activo' => 'CARGADOR', 'tipo_id' => '6']);
        Activo::create(['activo' => 'CÁMARA', 'tipo_id' => '6']);
        Activo::create(['activo' => 'MÓDULO SENSOR', 'tipo_id' => '6']);
        Activo::create(['activo' => 'SENSOR', 'tipo_id' => '6']);
        Activo::create(['activo' => 'MICRÓFONO', 'tipo_id' => '6']);
        Activo::create(['activo' => 'ARDUINO', 'tipo_id' => '6']);
        Activo::create(['activo' => 'RASPBERRY', 'tipo_id' => '6']);
        Activo::create(['activo' => 'CABLE DUPONT', 'tipo_id' => '6']);
        Activo::create(['activo' => 'COMPRESOMETRO-EXTENSOMETRO PARA CILINDROS', 'tipo_id' => '6']);
        Activo::create(['activo' => 'CESTA PARA PRUEBA DE GRAVEDAD ESPECÍFICA Y ABSORCIÓN', 'tipo_id' => '6']);
        //Muebles y enseres
        Activo::create(['activo' => 'TRÍPODE', 'tipo_id' => '3']);
        Activo::create(['activo' => 'ECRAM', 'tipo_id' => '3']);
        Activo::create(['activo' => 'ESCRITORIO', 'tipo_id' => '3']);
        Activo::create(['activo' => 'SILLON', 'tipo_id' => '3']);
        Activo::create(['activo' => 'SILLAS', 'tipo_id' => '3']);
        Activo::create(['activo' => 'GABETEROS', 'tipo_id' => '3']);
        Activo::create(['activo' => 'TELEFONO', 'tipo_id' => '3']);
        Activo::create(['activo' => 'RADIO', 'tipo_id' => '3']);
        Activo::create(['activo' => 'MESA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'PUPITRES', 'tipo_id' => '3']);
        Activo::create(['activo' => 'CAMARA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'PIZARRON', 'tipo_id' => '3']);
        Activo::create(['activo' => 'ESTANTE', 'tipo_id' => '3']);
        Activo::create(['activo' => 'MOSTRADOR', 'tipo_id' => '3']);
        Activo::create(['activo' => 'ESCENARIO', 'tipo_id' => '3']);
        Activo::create(['activo' => 'CABINA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'LIVING', 'tipo_id' => '3']);
        Activo::create(['activo' => 'COMEDOR', 'tipo_id' => '3']);
        Activo::create(['activo' => 'COMODA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'CAMA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'COLCHON', 'tipo_id' => '3']);
        Activo::create(['activo' => 'LIBRERO', 'tipo_id' => '3']);
        Activo::create(['activo' => 'ORGANIZADOR', 'tipo_id' => '3']);
        Activo::create(['activo' => 'TABURETES', 'tipo_id' => '3']);
        Activo::create(['activo' => 'TABLERO', 'tipo_id' => '3']);
        Activo::create(['activo' => 'FOTOCOPIADORA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'ESTUFA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'ASPIRADORA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'BASUREROS', 'tipo_id' => '3']);
        Activo::create(['activo' => 'EXTINTORES', 'tipo_id' => '3']);
        Activo::create(['activo' => 'TAPAS', 'tipo_id' => '3']);
        Activo::create(['activo' => 'TANQUES', 'tipo_id' => '3']);
        Activo::create(['activo' => 'FUENTE DE PODER', 'tipo_id' => '3']);
        Activo::create(['activo' => 'ACCESORIOS', 'tipo_id' => '3']);
        Activo::create(['activo' => 'VENTILADORES', 'tipo_id' => '3']);
        Activo::create(['activo' => 'VAJILLA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'SOPORTE', 'tipo_id' => '3']);
        Activo::create(['activo' => 'ROLLER', 'tipo_id' => '3']);
        Activo::create(['activo' => 'URNA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'ESCALERA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'CHAMPANERA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'VINERA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'TAZA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'PANERO', 'tipo_id' => '3']);
        Activo::create(['activo' => 'VASO', 'tipo_id' => '3']);
        Activo::create(['activo' => 'AZUCARERO', 'tipo_id' => '3']);
        Activo::create(['activo' => 'CUCHARILLA', 'tipo_id' => '3']);
        Activo::create(['activo' => 'TENEDOR', 'tipo_id' => '3']);
        Activo::create(['activo' => 'CABLE', 'tipo_id' => '3']);
        Activo::create(['activo' => 'PEDESTAL', 'tipo_id' => '3']);
        Activo::create(['activo' => 'TANQUE DE AGUA', 'tipo_id' => '3']);
        //Muebles y enseres para la educacion
        Activo::create(['activo' => 'MESAS', 'tipo_id' => '4']);
        //Edificaciones
        Activo::create(['activo' => 'EDIFICIOS', 'tipo_id' => '2']);
        //equipos e instalaciones
        Activo::create(['activo' => 'CASETA INFLABLE', 'tipo_id' => '10']);
        Activo::create(['activo' => 'GLOBOS DANZANTES C/MOTOR', 'tipo_id' => '10']);
        Activo::create(['activo' => 'DRON', 'tipo_id' => '10']);
        Activo::create(['activo' => 'PLATAFORMA', 'tipo_id' => '10']);
        //comercioal Pregrado
        Activo::create(['activo' => 'ATRIL-1', 'tipo_id' => '3']);
        Activo::create(['activo' => 'ATRIL-2', 'tipo_id' => '3']);
        Activo::create(['activo' => 'PANEL ACRILICO PVC', 'tipo_id' => '3']);
        Activo::create(['activo' => 'ANILLADORA', 'tipo_id' => '3']);
        //terrenos
        Activo::create(['activo' => 'TERRENOS', 'tipo_id' => '1']);
        //Equipos de computacion
        Activo::create(['activo' => 'IMPRESORA TERMICA', 'tipo_id' => '5']);
        Activo::create(['activo' => 'EQUIPO DE DETECCION UV7MG7DD7IR - CONTADORA COMERCIAL', 'tipo_id' => '5']);
        Activo::create(['activo' => 'MONITOR TOUCH', 'tipo_id' => '5']);
        //Herramientas
        Activo::create(['activo' => 'ALICATES DE RED', 'tipo_id' => '13']);
        Activo::create(['activo' => 'CAJA DE HERRAMIENTAS', 'tipo_id' => '13']);
        //equipos e instalaciones
        Activo::create(['activo' => 'INTERCOMUNICADOR DE VENTANILLA METALICO MY-E360', 'tipo_id' => '12']);
        Activo::create(['activo' => 'DISPENSADOR DE AGUA', 'tipo_id' => '12']);
        Activo::create(['activo' => 'LENTE SONY 50 M.18', 'tipo_id' => '12']);
        Activo::create(['activo' => 'TRITURADORA DE PAPEL', 'tipo_id' => '12']);
        Activo::create(['activo' => 'DISPENSADOR AUTOMATICO', 'tipo_id' => '12']);
        //muebles y enseres
        Activo::create(['activo' => 'GAVETERO', 'tipo_id' => '3']);
        Activo::create(['activo' => 'MESAS', 'tipo_id' => '3']);
        //muebles y enseres para la educacion
        Activo::create(['activo' => 'PUPITRES DIESTRO', 'tipo_id' => '4']);
        Activo::create(['activo' => 'PUPITRES ZURDO', 'tipo_id' => '4']);
        Activo::create(['activo' => 'PIZARRON ACRILICO', 'tipo_id' => '4']);
        Activo::create(['activo' => 'PUPITRES ELECTROPLASTIFICOS', 'tipo_id' => '4']);
        //Muebles y enseres para la educacion
        //
        Activo::create(['activo' => 'CAMILLA TIPO TABLA RIGIDA', 'tipo_id' => '3']);
        //equipos de computacion
        Activo::create(['activo' => 'IMPRESORA DE TICKETS', 'tipo_id' => '5']);
        //equipos de seguridad y vigilancia
        Activo::create(['activo' => 'EQUIPO FORTINET', 'tipo_id' => '7']);
        Activo::create(['activo' => 'MOLINETE BIDIRECCIONAL', 'tipo_id' => '7']);
        //equipos de instalacion
        Activo::create(['activo' => 'FUENTE DE ALIMENTACION', 'tipo_id' => '10']);
        Activo::create(['activo' => 'ROUTER', 'tipo_id' => '10']);
        Activo::create(['activo' => 'TAMIZ DE 8 PULGADAS UTEST', 'tipo_id' => '10']);
        Activo::create(['activo' => 'BRUJULA', 'tipo_id' => '10']);
        Activo::create(['activo' => 'MIRA DE ALUMINIO DE 5 METROS', 'tipo_id' => '10']);
        Activo::create(['activo' => 'MOLDES METALICOS CILINDRICOS', 'tipo_id' => '10']);
        Activo::create(['activo' => 'NIVEL DE INGENIERO NL-32', 'tipo_id' => '10']);
        //Equipos e instlaciones
        Activo::create(['activo' => 'MOLA KITS 1- 2- 3', 'tipo_id' => '6']);
        Activo::create(['activo' => 'MOLA STRUCTURAL KIT 1', 'tipo_id' => '6']);
        Activo::create(['activo' => 'APARATO VICAT', 'tipo_id' => '6']);
        Activo::create(['activo' => 'FRASCO LE CHATELIER', 'tipo_id' => '6']);
        Activo::create(['activo' => 'MEZCLADORA DE CEMENTO', 'tipo_id' => '6']);
        Activo::create(['activo' => 'EQUIPO DE ROBOTICA', 'tipo_id' => '6']);
        Activo::create(['activo' => 'KIT  DE ROBOTICA LEGO MINDSTORMS', 'tipo_id' => '6']);

        Activo::create(['activo' => 'SILLAS', 'tipo_id' => '4']);
        
        Activo::create(['activo' => 'DISCO DE 6TB PORTATIL', 'tipo_id' => '5']);
        Activo::create(['activo' => 'DISCOS DUROS SOLIDOS 500GB', 'tipo_id' => '5']);
        Activo::create(['activo' => 'TABLET', 'tipo_id' => '5']);
        
        Activo::create(['activo' => 'TELEVISIÓN', 'tipo_id' => '10']);
        
        Activo::create(['activo' => 'IMPRESORA DE CARNET EVOLIZ', 'tipo_id' => '10']);
        Activo::create(['activo' => 'SCANER', 'tipo_id' => '10']);
        //muebles y enseres
        Activo::create(['activo' => 'SOPORTE PARA TV', 'tipo_id' => '3']);
        //muebles y enseres para la educacion
        Activo::create(['activo' => 'ESTANTE', 'tipo_id' => '4']);
    }
}
