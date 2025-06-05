<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Item;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style_Alignment;
use PHPExcel_Worksheet_Drawing;

class ReporteExportController extends Controller
{
    public function exportarExcel()
    {
        $resultados = Item::with(['activo', 'area', 'tipo', 'estado'])->get();

        Excel::create('Reporte_Activos_' . date('Y-m-d'), function ($excel) use ($resultados) {
            $excel->sheet('Activos', function ($sheet) use ($resultados) {

                // Título
                $sheet->mergeCells('A1:F1');
                $sheet->row(1, ['REPORTE DE ACTIVOS']);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $sheet->row(2, ['Fecha de reporte: ' . date('d-m-Y')]);
                $sheet->row(3, []); // Espacio

                // Encabezados
                $sheet->row(4, ['#', 'Código', 'Nombre', 'Área', 'Tipo', 'Estado']);

                // Datos
                $row = 5;
                foreach ($resultados as $index => $item) {
                    $codigo = isset($item->codigo) ? $item->codigo : '';
                    $nombre = ($item->activo && isset($item->activo->activo)) ? $item->activo->activo : '';
                    $area = ($item->area && isset($item->area->nombre)) ? $item->area->nombre : '';
                    $tipo = ($item->tipo && isset($item->tipo->nombre)) ? $item->tipo->nombre : '';
                    $estado = ($item->estado && isset($item->estado->estado)) ? $item->estado->estado : '';

                    $sheet->row($row++, [
                        $index + 1,
                        $codigo,
                        $nombre,
                        $area,
                        $tipo,
                        $estado,
                    ]);
                }


                // Línea de firma
                $sheet->row($row + 2, []);
                $sheet->row($row + 3, []);
                $sheet->row($row + 4, ['FIRMA: __________________________']);
            });
        })->export('xls');
    }
}
