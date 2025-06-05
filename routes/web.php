<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {

    Route::get('/conexion/sucursal', ['uses' => 'BranchController@index'])->name('branches.index');
    Route::post('/conexion/sucursal/select', ['uses' => 'BranchController@select'])->name('branches.select');
    // Usuarios
    Route::get('/users', ['uses' => 'UsersController@index']);
    Route::get('/users/create', ['uses' => 'UsersController@create']);
    Route::post('/users', ['uses' => 'UsersController@store']); //->middleware('control');
    Route::get('/users/{id}/edit', ['uses' => 'UsersController@edit']);
    Route::post('/users/{id}/edit', ['uses' => 'UsersController@update']); //->middleware('control');
    Route::get('/users/{id}/show', ['uses' => 'UsersController@show']);
    Route::get('/users/{id}/activar', ['uses' => 'UsersController@activarCuenta']); //->middleware('control');
    Route::delete('/users/{id}/delete', ['uses' => 'UsersController@destroy']); //->middleware('control');
    Route::delete('/users/{id}/eliminar', ['uses' => 'UsersController@eliminarCuenta']); ///->middleware('control');
    // Reset password
    Route::get('/password/{id}/reset', ['uses' => 'UsersController@viewResetPassword']);
    Route::post('/password/{id}/reset', ['uses' => 'UsersController@resetPassword']); //->middleware('control');
    Route::get('/actividades', ['uses' => 'UsersController@actividadesUser']);

    Route::get('/backups', 'BackupController@index');
    Route::post('/backup/manual', 'BackupController@crearBackup')->name('backup.manual');
    Route::get('/backup/descargar/{file}', function ($file) {
        $file = urldecode($file);
        $path = storage_path('app/backups/' . $file);
        if (file_exists($path)) {
            return response()->download($path);
        }
        abort(404);
    });
});

Route::group(['middleware' => ['auth', 'admin', 'switch.branch'], 'prefix' => 'admin'], function () {
    Route::get('/user/areas', 'HomeController@SuperUserAreas')->name('home.areas');
    // Areas
    Route::get('/area/create', ['uses' => 'AreaController@create']);
    Route::post('/area', ['uses' => 'AreaController@store']); //->middleware('control');
    Route::get('/area/{id}/edit', ['uses' => 'AreaController@edit']);
    Route::post('/area/{id}/edit', ['uses' => 'AreaController@update']); //->middleware('control');
    Route::delete('/area/{id}', ['uses' => 'AreaController@destroy']); //->middleware('control');
    Route::get('/area/{id}/show', ['uses' => 'AreaController@show']);
    // Activos
    Route::get('/obtener-activos-por-tipo/{tipoId}', 'ItemController@obtenerActivosPorTipo');
    Route::get('/activo/create', 'AreaController@createActivo');
    Route::post('/activo', ['uses' => 'AreaController@storeActivo']); //->middleware('control');
    //Otros Materiales
    Route::get('/material/create/{id}', ['uses' => 'MaterialController@otroMaterial']);
    Route::post('/material/create', ['uses' => 'MaterialController@storeMaterial']); //->middleware('control');
    Route::get('/otro/material{id}/show', ['uses' => 'MaterialController@showMaterial']);
    Route::post('/material/{id}/eliminar', ['uses' => 'MaterialController@deleteMaterial']); //->middleware('control');
    Route::get('/otro/material{id}/edit', ['uses' => 'MaterialController@editMaterial']);
    Route::post('/otro/material{id}', ['uses' => 'MaterialController@updateMaterial']); //->middleware('control');
    // Activos o items del area
    Route::get('/item/create/{id}', ['uses' => 'ItemController@create']);
    Route::post('/item', ['uses' => 'ItemController@store']); //->middleware('control');
    Route::get('/item/{id}/edit', ['uses' => 'ItemController@edit']);
    Route::post('/item/{id}/edit', ['uses' => 'ItemController@update']); //->middleware('control');
    Route::post('/item/{id}/delete', ['uses' => 'ItemController@destroy']); //->middleware('control');
    Route::post('/item/{id}/eliminar', ['uses' => 'ItemController@delete']); //->middleware('control');
    Route::get('/item/{id}/show', ['uses' => 'ItemController@show']);
    Route::get('/item/{id}/history', ['uses' => 'ItemController@history']);
    // Error 404
    Route::get('/error', ['uses' => 'HomeController@sinPermiso']);
    // Reportes
    Route::get('/reportes', ['uses' => 'HomeController@reportesActivos'])->name('reporte.activos'); //->middleware('control');
    Route::post('/buscar.activos', ['uses' => 'HomeController@selectActivos'])->name('search.activos'); //->middleware('control');
    Route::post('/resultados.activos', ['uses' => 'HomeController@mostrarResultados'])->name('buscar.activo.reporte'); //->middleware('control'); 
    Route::get('/exportar-activos', 'ReporteExportController@exportarExcel')->name('exportar.activos');
});
