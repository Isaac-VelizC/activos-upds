<?php

namespace App\Http\Controllers;

use App\Area;
use App\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MaterialController extends Controller
{
    public function otroMaterial($id)
    {
        $area = Area::find($id);
        return view('items.otro_material', compact('area'));
    }

    public function storeMaterial(Request $request)
    {
        // Validación de datos
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación del archivo
            'id_area' => 'required|integer',
        ]);

        // Crear nueva instancia
        $material = new Material();
        $material->nombre = $request->input('nombre');
        $material->descripcion = $request->input('descripcion');
        $material->area_id = $request->input('id_area');

        $user = auth()->user();

        // Manejo de imagen
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path('img/otros/' . $user->dep->sigla);
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $material->image = $fileName;
        }

        $material->save();

        return back()->with('success', 'Material registrado exitosamente');
    }

    public function showMaterial($id)
    {
        $otro = Material::find($id);
        return view('otros_materiales.show', compact('otro'));
    }

    public function editMaterial($id)
    {
        $material = Material::find($id);
        return view('otros_materiales.edit', compact('material'));
    }

    public function updateMaterial(Request $request, $id)
    {
        // Validar los datos
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'id_area' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Buscar el material
        $item = Material::find($id);

        if (!$item) {
            return back()->with('error', 'Material no encontrado.');
        }

        // Asignar los nuevos valores
        $item->nombre = $request->input('nombre');
        $item->descripcion = $request->input('descripcion');
        $item->area_id = $request->input('id_area');

        $user = auth()->user();

        // Procesar nueva imagen si se carga
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path('img/otros/' . $user->dep->sigla);

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $file->move($path, $fileName);

            // Eliminar imagen anterior si existe
            if ($item->image) {
                $previousPath = $path . '/' . $item->image;
                if (file_exists($previousPath)) {
                    File::delete($previousPath);
                }
            }

            // Guardar nuevo nombre
            $item->image = $fileName;
        }

        // Guardar cambios
        $item->save();

        return view('otros_materiales.show')
            ->with('success', 'Material actualizado correctamente.')
            ->with('otro', $item);
    }

    public function deleteMaterial($id)
    {
        $item = Material::find($id);
        $item->delete();
        return redirect('admin/area/' . $item->area_id . '/show')->with('success', 'Item eliminado con éxito');
    }
}
