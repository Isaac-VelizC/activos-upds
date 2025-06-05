<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('branches.index', compact('branches'));
    }

    public function select(Request $request)
    {
        // Validación manual con Validator
        $validator = Validator::make($request->all(), [
            'branch_id' => 'required|exists:branches,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $branch = Branch::findOrFail($request->branch_id);

        // Guardar datos en sesión
        session([
            'branch_id' => $branch->id,
            'branch_db' => $branch->db_name,
        ]);

        return redirect()->route('home')->with('success', 'Sucursal seleccionada: ' . $branch->name);
    }
}
