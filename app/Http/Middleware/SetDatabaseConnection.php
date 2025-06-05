<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class SetDatabaseConnection
{
    public function handle($request, Closure $next)
    {
        
        dd('hola2');
        if ($request->user() && !$request->user()->super_user) {
            $departmentId = $request->user()->department_id;
            $connectionName = 'department_' . $departmentId;

            // Verificar si la conexión existe en config/database.php
            if (array_key_exists($connectionName, Config::get('database.connections'))) {
                DB::purge($connectionName);
                Config::set('database.default', $connectionName);
            }
        }
        return $next($request);
    }
}
