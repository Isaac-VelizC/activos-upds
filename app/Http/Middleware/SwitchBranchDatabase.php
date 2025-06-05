<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SwitchBranchDatabase
{
    public function handle($request, Closure $next)
    {
        if (Session::has('branch_db')) {
            $branchDb = Session::get('branch_db');
            Config::set('database.connections.branch', [
                'driver'    => 'mysql',
                'host'      => env('DB_HOST', '127.0.0.1'),
                'port'      => env('DB_PORT', '3306'),
                'database'  => $branchDb,
                'username'  => env('DB_USERNAME', 'root'),
                'password'  => env('DB_PASSWORD', ''),
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
                'strict'    => false,
                'engine'    => null,
            ]);
            DB::purge('branch');
            DB::setDefaultConnection('branch');
        } else {
            DB::setDefaultConnection(Config::get('database.default'));
        }

        return $next($request);
    }
}
