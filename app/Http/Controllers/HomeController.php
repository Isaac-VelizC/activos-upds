<?php

namespace App\Http\Controllers;

use App\Activo;
use App\Area;
use App\Item;
use App\Tipos;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->admin) {
            $user = User::find(auth()->user()->id);
            if ($user && $user->super_user) {
                return view('sucursales');
            } else {
                $areas = Area::orderBy('sigla', 'asc')->get();
                $databaseName = config('database.connections.' . config('database.default') . '.database');
                $superUser = true;
                return view('home', compact('areas', 'user', 'databaseName', 'superUser'));
            }
        }
        return view('welcome');
    }

    public function sinPermiso()
    {
        return view('errors.permiso');
    }

    public function SuperUserAreas()
    {
        $user = User::find(auth()->user()->id);
        $superUser = true;
        if ($user == null) {
            $superUser = false;
        }
        $areas = Area::orderBy('sigla', 'asc')->get();
        $databaseName = config('database.connections.' . config('database.default') . '.database');
        return view('home', compact('areas', 'user', 'databaseName', 'superUser'));
    }

    public function reportesActivos()
    {
        $tipos = Tipos::all();
        $resultados = [];
        return view('reportes', compact('tipos', 'resultados'));
    }

    public function selectActivos(Request $request)
    {
        $query = $request->input('name');
        $activos = Activo::where('activo', 'like', '%' . $query . '%')
            //->orWhere('ap_paterno', 'like', '%' . $query . '%')
            ->get();
        return response()->json($activos);
    }

    public function mostrarResultados(Request $request)
    {
        $tipos = Tipos::all();
        $query1 = $request->input('activo');
        $resultados = Item::with(['activo', 'area', 'tipo', 'Estado'])
            ->where('activo_id', $query1)
            ->get();

        $num = 1;
        return view('reportes', compact('tipos', 'resultados', 'num'));
    }
}
