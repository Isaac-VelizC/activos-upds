<?php

namespace App\Http\Middleware;

use App\DepartamentoUser;
use App\User;
use Closure;
use Illuminate\Support\Facades\DB;

class ChangeDatabaseConnection
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($request->user() && !$request->user()->super_user) {
            if (auth()->check()) {
                $user = auth()->user();
                $dep = $user->dep;
                $inst = $user->instituto;
                if ($dep && in_array($dep->sigla, ['PO', 'SU', 'TJ', 'LP', 'CB', 'OR', 'SC', 'PA', 'BE'])) {
                    $databaseConnection = "departamento_" . strtolower($dep->sigla);
                    if ($inst !== 'u') {
                        $databaseConnection .= '_'. strtolower($inst);
                    }
                    config(['database.default' => $databaseConnection]);
                    DB::reconnect();
                    // Agregar el ID del usuario a la sesión
                    session(['db' => $databaseConnection]);
                    // O agregar el ID del usuario al objeto Request
                    $request->merge(['db' => $databaseConnection]);
                }
            }
        }
        return $next($request);
    }
}
