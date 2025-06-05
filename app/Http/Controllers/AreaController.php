<?php

namespace App\Http\Controllers;

use App\Activo;
use App\Area;
use App\Material;
use App\observacion;
use App\Tipos;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    /*public function index() {
        if (auth()->user()->admin) {
            //$user = User::find(auth()->user()->id);
            $areas = Area::orderBy('sigla', 'asc')->get();
            $databaseName = config('database.connections.' . config('database.default') . '.database');
            return view('branches.areas_sucursal', compact('areas', 'user', 'databaseName'));
        }
    }*/
    
    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'encargado' => 'required',
            'descripcion' => 'required',
            'sigla' => 'required',
        ]);
        //$databaseName = config('database.connections.' . config('database.default') . '.database');
        $coll = new Area();
        $coll->nombre = $request->nombre;
        $coll->descripcion = $request->descripcion;
        $coll->encargado = $request->encargado;
        $areaSigla = Area::all();
        foreach ($areaSigla as $item) {
            if ($request->sigla ==  $item->sigla) {
                return back()->with('success', 'La sigla ya existe debe de ser Unica.');
            }
        }
        $coll->sigla = $request->sigla;
        $coll->save();
        return redirect('/')->with('success', 'Registrado con éxito.');
    }

    public function show($id)
    {
        $user = User::find(auth()->user()->id);
        $tipo = Tipos::all();
        $area = Area::find($id);
        if (!$area) {
            return redirect()->back()->with('error', 'No se encontro el area');
        }
        $obser = observacion::all();
        $otro = Material::where('area_id', $id)->get();
        $cantidad = count($otro);
        $superUser = Auth::user()->super_user;
        return view('areas.show', compact('otro', 'area', 'tipo', 'user', 'obser', 'cantidad', 'superUser'));
    }

    public function edit($id)
    {
        $area = Area::find($id);
        return view('areas.edit')->with('area', $area);
    }

    public function update(Request $request, $id)
    {
        // Validate
        $this->validate($request, [
            'nombre' => 'required',
            'encargado' => 'required',
            'descripcion' => 'required',
        ]);

        // Update
        $coll = Area::find($id);
        $coll->nombre = $request->nombre;
        $coll->encargado = $request->encargado;
        $coll->descripcion = $request->descripcion;
        $areaSigla = Area::all();
        if ($coll->sigla != $request->sigla) {
        foreach ($areaSigla as $item) {
            if ($request->sigla ==  $item->sigla ) {
                return back()->with('success', 'La sigla ya existe debe de ser Unica.');
            }
        }
        }
        $coll->sigla = $request->sigla;
        $coll->update();
        // Redirect
        return redirect('/')->with('success', 'Area actualizada con éxito.');
    }

    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();
        return redirect('/')->with('success', 'Area eliminada con éxito');
    }

    /// Activos
    public function createActivo() {
        $tipos = Tipos::all();
        return view('activo.create', compact('tipos'));
    }

    public function storeActivo(Request $request) {
        // Validate
        $this->validate($request, [
            'nombre' => 'required',
            'id_tipo' => 'required'
        ]);
        $coll = new Activo();
        $coll->activo = $request->nombre;
        $coll->tipo_id = $request->id_tipo;
        $coll->save();
        return redirect('/')->with('success', 'Registrado con éxito el activo.');
    }
}
