<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BackupController extends Controller
{
    public function index() {
        
        $branches = Branch::all(); // Traemos todas las sucursales
        return view('backups.index', compact('branches'));
    }

    public function crearBackup(Request $request)
    {
        // Validar que se envíe branch_id
        $validator = Validator::make($request->all(), [
            'branch_id' => 'required|exists:branches,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        // Buscar la sucursal seleccionada
        $branch = Branch::find($request->branch_id);

        // Obtener info de conexión (db_name de la sucursal)
        $db = $branch->db_name;
        $user = env('DB_USERNAME');
        $pass = env('DB_PASSWORD');
        $host = env('DB_HOST');

        $fecha = date('Y-m-d_H-i-s');
        $filename = "backup_{$db}_{$fecha}.sql";

        $path = storage_path('app/backups');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Comando mysqldump apuntando a la base de datos seleccionada
        $comando = "mysqldump --user={$user} --password=\"{$pass}\" --host={$host} {$db} > {$path}/{$filename}";

        exec($comando, $output, $return_var);

        if ($return_var === 0) {
            return redirect()->back()->with('success', 'Backup creado exitosamente para la sucursal: ' . $branch->name);
        } else {
            return redirect()->back()->with('error', 'Error al crear el backup.');
        }
    }

    /**
     * mysqldump --version
     * sudo apt install mysql-client
     */
    

    /*public function crearBackup()
    {
        $db = env('DB_DATABASE');
        $user = env('DB_USERNAME');
        $pass = env('DB_PASSWORD');
        $host = env('DB_HOST');
        $fecha = date('Y-m-d_H-i-s');
        $filename = "backup_{$db}_{$fecha}.sql";

        $path = storage_path('app/backups');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // El comando mysqldump (asegúrate que mysqldump está en el PATH del sistema)
        $comando = "mysqldump --user={$user} --password=\"{$pass}\" --host={$host} {$db} > {$path}/{$filename}";

        exec($comando, $output, $return_var);

        if ($return_var === 0) {
            return redirect()->back()->with('success', 'Backup creado exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Error al crear el backup.');
        }
    }*/
}
