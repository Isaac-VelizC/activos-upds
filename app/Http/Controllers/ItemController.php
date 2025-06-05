<?php

namespace App\Http\Controllers;

use App\Activo;
use App\Area;
use App\Centro;
use App\Estado;
use App\Item;
use App\Movimiento;
use App\Tipos;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

require_once(public_path('phpqrcode/qrlib.php'));

class ItemController extends Controller
{
    public function create($id)
    {
        $tipoActivo = Tipos::all();
        $areas = Area::all();
        $analisis = Centro::all();
        $estados = Estado::all();
        if ($id === '0') {
            return view('items.create', compact('estados'))->with('analis', $analisis)->with('areas', $areas)->with('tipoActivo', $tipoActivo);;
        } else {
            $idarea = Area::find($id);
            return view('items.create', compact('estados'))->with('analis', $analisis)->with('areas', $areas)->with('tipoActivo', $tipoActivo)->with('idarea', $idarea);
        }
    }

    public function store(Request $request)
    {
        // Validar datos
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'id_area' => 'required',
            'id_tipo' => 'required',
            'id_estado' => 'required',
            'fecha' => 'required|date',
            'id_centro' => 'required',
        ]);
        try {

            // Buscar modelos relacionados
            $area = Area::find($request->input('id_area'));
            $tipo = Tipos::find($request->input('id_tipo'));
            $activo = Activo::find($request->input('nombre'));
            $user = User::find(auth()->user()->id);

            if (!$area || !$tipo || !$activo || !$user) {
                return redirect()->back()->with('error', 'Error al obtener datos relacionados. Verifica la información ingresada.');
            }

            // Crear nuevo item
            $item = new Item();
            $item->activo_id = $request->input('nombre');
            $item->descripcion = $request->input('descripcion');
            $item->area_id = $request->input('id_area');
            $item->tipo_id = $request->input('id_tipo');
            $item->estado_id = $request->input('id_estado');
            $item->centro_id = $request->input('id_centro');
            $item->modelo = $request->input('modelo');
            $item->serie = $request->input('serie');
            $item->fecha_compra = $request->input('fecha');

            // Generar código UPDS
            $siglaActivo = strtoupper(substr($activo->activo, 0, 3));
            $count = Item::where('area_id', $area->id)
                ->where('activo_id', $request->input('nombre'))
                ->count();
            $num = $count + 1;
            $item->codigo = $area->sigla . '.' . $tipo->codigo . '.' . $siglaActivo . '.' . sprintf('%05d', $num);

            // Guardar imagen si existe
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $folderPath = public_path('img/fotos/' . $user->dep->sigla);

                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0755, true);
                }

                $fileName = uniqid() . '-' . $file->getClientOriginalName();
                $moved = $file->move($folderPath, $fileName);

                if ($moved) {
                    $item->image = $fileName;
                }
            }

            // Guardar en base de datos
            $item->save();

            return redirect('/')->with('success', 'Activo registrado exitosamente');
        } catch (\Exception $e) {
            // Registrar el error en el log
            Log::error('Error al registrar activo: ' . $e->getMessage());

            // Redireccionar con mensaje de error
            return redirect()->back()->with('error', 'Ocurrió un error al guardar el activo. Intenta nuevamente o contacta al administrador.');
        }
    }

    public function show($id)
    {
        $databaseName = config('database.connections.' . config('database.default') . '.database');
        $depart = strtoupper(substr($databaseName, -2));
        $item = Item::find($id);
        ob_start();
        $url = url('vistaQR/' . $item->id . ($depart == 'PO' ? '' : '/' . $depart));
        QRcode::png($url);
        $qrImage = ob_get_clean();
        return view('items.show', ['item' => $item, 'qrImage' => $qrImage]);
    }

    public function edit($id)
    {
        $tipoActivo = Tipos::all();
        $analis = Centro::all();
        $estados = Estado::all();
        $item = Item::find($id);
        $activos = Activo::all();
        // retrieve areas
        $areas = Area::all();
        return view('items.edit', compact('estados'))
            ->with('item', $item)
            ->with('analis', $analis)
            ->with('areas', $areas)
            ->with('activos', $activos)
            ->with('tipoActivo', $tipoActivo);
    }

    public function update(Request $request, $id)
    {
        try {
            // Validar datos mínimos
            $this->validate($request, [
                'nombre' => 'required',
                'id_area' => 'required',
            ]);

            $user = User::find(auth()->user()->id);
            $item = Item::find($id);

            if (!$item || !$user) {
                return redirect()->back()->with('error', 'Activo o usuario no encontrado.');
            }

            // Actualizar campos básicos
            $item->activo_id = $request->input('nombre');
            $item->descripcion = $request->input('descripcion');
            $item->estado_id = $request->input('id_estado');
            $item->centro_id = $request->input('id_centro');
            $item->modelo = $request->input('modelo');
            $item->serie = $request->input('serie');

            // Verificar si cambió de área
            if ($item->area_id != $request->input('id_area')) {
                $nuevaArea = Area::find($request->input('id_area'));

                if (!$nuevaArea) {
                    return redirect()->back()->with('error', 'El área seleccionada no existe.');
                }

                // Guardar movimiento
                $movi = new Movimiento();
                $movi->item_id = $item->id;
                $movi->descripcion = 'Se movió de ' . $item->area->nombre . ' a ' . $nuevaArea->nombre;
                $movi->save();

                // Generar nuevo código
                $tipo = Tipos::find($request->input('id_tipo'));
                $activo = Activo::find($request->input('nombre'));

                if (!$tipo || !$activo) {
                    return redirect()->back()->with('error', 'Tipo o Activo no válidos.');
                }

                $siglaActivo = strtoupper(substr($activo->activo, 0, 3));
                $elementos = Item::where('area_id', $nuevaArea->id)
                    ->where('activo_id', $request->input('nombre'))
                    ->count();
                $num = $elementos + 1;

                $item->codigo = $nuevaArea->sigla . '.' . $tipo->codigo . '.' . $siglaActivo . '.' . sprintf('%05d', $num);
                $item->area_id = $nuevaArea->id;
            }

            // Actualizar tipo si cambió (aún si no cambió área)
            $item->tipo_id = $request->input('id_tipo');

            // Actualizar fecha si fue enviada
            if (!empty($request->input('fecha_compra'))) {
                $item->fecha_compra = $request->input('fecha_compra');
            }

            // Guardar nueva imagen si se cargó
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $folder = public_path() . '/img/fotos/' . $user->dep->sigla;

                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }

                $fileName = uniqid() . '-' . $file->getClientOriginalName();
                $moved = $file->move($folder, $fileName);

                if ($moved) {
                    // Eliminar imagen anterior si existe
                    if (!empty($item->image)) {
                        $prevPath = $folder . '/' . $item->image;
                        if (file_exists($prevPath)) {
                            File::delete($prevPath);
                        }
                    }

                    $item->image = $fileName;
                }
            }

            // Guardar cambios
            $item->save();

            // Generar código QR
            ob_start();
            QRcode::png(url('vistaQR/' . $item->id));
            $qrImage = ob_get_clean();

            return view('items.show')
                ->with('success', 'Activo actualizado correctamente.')
                ->with('item', $item)
                ->with('qrImage', $qrImage);
        } catch (\Exception $e) {
            Log::error('Error al actualizar activo: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el activo.');
        }
    }

    public function destroy(Request $request, $id)
    {
        $item = Item::find($id);
        if ($request->has('encargado') && $request->has('id_observacion')) {
            $item->user_baja = $request->encargado;
            $item->obserb_id = $request->id_observacion;
            $item->fecha_baja = Carbon::now();
            $item->estado = 0;
            $item->update();
            return redirect('/')->with('success', 'Mueble dado de baja correctamente');
        } else {
            return redirect('/')->with('success', 'Error al dar de baja, No agrego todos los datos necesarios');
        }
    }

    public function delete($id, Request $request)
    {
        $item = Item::find($request->item_id);
        $item->delete();
        return redirect('admin/area/'.$item->area_id.'/show')->with('success', 'Item eliminado con éxito');
    }

    public function history($id)
    {
        $coll = Item::find($id);
        $hitory = Movimiento::where('item_id', $id)->get();
        return view('items.history')->with('hitory', $hitory)->with('item', $coll);
    }

    public function obtenerActivosPorTipo($tipoId)
    {
        if ($tipoId === 'ningun-activo') {
            return response()->json([]);
        }
        $activos = Activo::where('tipo_id', $tipoId)->get();
        return response()->json($activos);
    }
}
