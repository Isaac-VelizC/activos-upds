<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
        ],

        // Esta conexión puede ser estática o generada en middleware
        'branch' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => '', // Vacía, se configura dinámicamente en middleware
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ],
        
        'departamento_po' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_PO', '127.0.0.1'),
            'port' => env('DB_PORT_PO', '3306'),
            'database' => env('DB_DATABASE_PO', 'forge'),
            'username' => env('DB_USERNAME_PO', 'forge'),
            'password' => env('DB_PASSWORD_PO', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'departamento_su' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_SU', '127.0.0.1'),
            'port' => env('DB_PORT_SU', '3306'),
            'database' => env('DB_DATABASE_SU', 'forge'),
            'username' => env('DB_USERNAME_SU', 'forge'),
            'password' => env('DB_PASSWORD_SU', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        'departamento_tj' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_TJ', '127.0.0.1'),
            'port' => env('DB_PORT_TJ', '3306'),
            'database' => env('DB_DATABASE_TJ', 'forge'),
            'username' => env('DB_USERNAME_TJ', 'forge'),
            'password' => env('DB_PASSWORD_TJ', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        'departamento_lp' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_LP', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE_LP', 'forge'),
            'username' => env('DB_USERNAME_LP', 'forge'),
            'password' => env('DB_PASSWORD_LP', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'departamento_cb' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_CB', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE_CB', 'departamento_cb'),
            'username' => env('DB_USERNAME_CB', 'root'),
            'password' => env('DB_PASSWORD_CB', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        'departamento_or' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_OR', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE_OR', 'departamento_or'),
            'username' => env('DB_USERNAME_OR', 'root'),
            'password' => env('DB_PASSWORD_OR', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        'departamento_sc' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_SC', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE_SC', 'departamento_sc'),
            'username' => env('DB_USERNAME_SC', 'root'),
            'password' => env('DB_PASSWORD_SC', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        'departamento_be' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_BE', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE_BE', 'departamento_be'),
            'username' => env('DB_USERNAME_BE', 'root'),
            'password' => env('DB_PASSWORD_BE', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        'departamento_pa' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_PA', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE_PA', 'departamento_pa'),
            'username' => env('DB_USERNAME_PA', 'root'),
            'password' => env('DB_PASSWORD_PA', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        ///Instituciones
        'departamento_tj_i' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_TJ_I', '127.0.0.1'),
            'port' => env('DB_PORT_TJ_I', '3306'),
            'database' => env('DB_DATABASE_TJ_I', 'forge'),
            'username' => env('DB_USERNAME_TJ_I', 'forge'),
            'password' => env('DB_PASSWORD_TJ_I', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        'departamento_sc_i' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_SC_I', '127.0.0.1'),
            'port' => env('DB_PORT_SC_I', '3306'),
            'database' => env('DB_DATABASE_SC_I', 'forge'),
            'username' => env('DB_USERNAME_SC_I', 'forge'),
            'password' => env('DB_PASSWORD_SC_I', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        ///Colegios
        'departamento_tj_c' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_TJ_C', '127.0.0.1'),
            'port' => env('DB_PORT_TJ_C', '3306'),
            'database' => env('DB_DATABASE_TJ_C', 'forge'),
            'username' => env('DB_USERNAME_TJ_C', 'forge'),
            'password' => env('DB_PASSWORD_TJ_C', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        'departamento_sc_c' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_SC_C', '127.0.0.1'),
            'port' => env('DB_PORT_SC_C', '3306'),
            'database' => env('DB_DATABASE_SC_C', 'forge'),
            'username' => env('DB_USERNAME_SC_C', 'forge'),
            'password' => env('DB_PASSWORD_SC_C', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        ///clinica
        'departamento_sc_cl' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_SC_CL', '127.0.0.1'),
            'port' => env('DB_PORT_SC_CL', '3306'),
            'database' => env('DB_DATABASE_SC_CL', 'forge'),
            'username' => env('DB_USERNAME_SC_CL', 'forge'),
            'password' => env('DB_PASSWORD_SC_CL', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
