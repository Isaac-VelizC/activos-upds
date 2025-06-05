<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Departamento;
use App\Permiso;
use App\PrincipalPermisos;
use App\PrincipalUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index() {
        $users = PrincipalUser::all();
        $userAuth = PrincipalUser::find(auth()->user()->id);

        if (!$userAuth) {
            return redirect('/admin/error');
        }

        // Verificar permiso antes de mostrar la vista
        if ($userAuth->permiso->crear_user == 1) {
            return view('users.index', compact('users'));
        } else {
            return redirect('/admin/error');
        }
    }
    
    public function create()
    {
        $depat = Departamento::all();
        $userAuth = PrincipalUser::find(auth()->user()->id);
        return $userAuth->permiso->crear_user == 1 ? view('users.create', compact('depat')) : redirect('/admin/error');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $userId = mt_rand(10000, 99999);
        while (PrincipalUser::where('id', $userId)->exists()) {
            $userId = mt_rand(10000, 99999);
        }
        $instituto = $request->instituto;
        $depar = Departamento::find($request->id_depart);
        if (in_array($depar->sigla, ['PO', 'SU', 'TJ', 'LP', 'CB', 'OR', 'SC', 'PA', 'BE'])  && in_array($instituto, ['u', 'i', 'c', 'cl'])) {
            $databaseConnection = "departamento_" . strtolower($depar->sigla);
            if ($instituto !== 'u') {
                $databaseConnection .= '_' . strtolower($instituto);
            }
            try {
                DB::connection($databaseConnection)->getPdo();
                config(['database.default' => $databaseConnection]);
                DB::reconnect();
                User::create([
                    'id' => $userId,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'dep_id' => $request->id_depart,
                    'instituto' => $instituto,
                    'admin' => true,
                ]);
                Permiso::updateOrCreate(['user_id' => $userId]);
                ///En la base de datos principal
                PrincipalUser::create([
                    'id' => $userId,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'dep_id' => $request->id_depart,
                    'instituto' => $instituto,
                    'admin' => true,
                ]);
                PrincipalPermisos::updateOrCreate(['user_id' => $userId]);
                return back()->with('success', 'Usuario Creado Exitosamente');
            } catch (\Exception $e) {
                //dd($e->getMessage());
                // La conexión no existe
                return back()->with('error', 'La base de datos no existe');
            }
        }
        return back()->with('error', 'Credenciales invalidas');
    }

    public function edit($id)
    {
        $edit = PrincipalUser::find($id);
        $permisos = PrincipalPermisos::where('user_id', $edit->id)->first();
        $userAuth = User::find(auth()->user()->id);
        return $userAuth->permiso->crear_user == 1 ? view('users.edit', compact('edit', 'permisos')) : redirect('/admin/error');
    }

    public function update(Request $request, $id)
    {
        $user1 = PrincipalUser::find($id);
        $user1->name = $request->name;
        $user1->email = $request->email;
        $user1->update();
        // Obtener los permisos seleccionados
        $permisosSeleccionados = $request->input('permisos', []);
        $instituto = $user1->instituto;
        $depar = Departamento::find($user1->dep_id);
        if (in_array($depar->sigla, ['PO', 'SU', 'TJ', 'LP', 'CB', 'OR', 'SC', 'PA', 'BE'])  && in_array($instituto, ['u', 'i', 'c', 'cl'])) {
            // Cambia la configuraciÃ³n de la base de datos
            $databaseConnection = "departamento_" . strtolower($depar->sigla);
            if ($instituto !== 'u') {
                $databaseConnection .= '_' . strtolower($instituto);
            }
            try {
                DB::connection($databaseConnection)->getPdo();
                config(['database.default' => $databaseConnection]);
                DB::reconnect();
                // Crea el usuario en la segunda base de datos con la misma ID
                $user = User::find($id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->update();
                // Guardar los permisos en la base de datos
                Permiso::updateOrCreate(
                    ['user_id' => $id], // Buscar el permiso por el ID de usuario
                    [
                        'user_id' => $id,
                        'crear_user' => in_array('crear_user', $permisosSeleccionados),
                        'dar_baja_item' => in_array('dar_baja_item', $permisosSeleccionados),
                        'crear_item' => in_array('crear_item', $permisosSeleccionados),
                        'borrar_item' => in_array('borrar_item', $permisosSeleccionados),
                        'editar_item' => in_array('editar_item', $permisosSeleccionados),
                        'exportar' => in_array('exportar', $permisosSeleccionados),
                        'crear_area' => in_array('crear_area', $permisosSeleccionados),
                        'editar_area' => in_array('editar_area', $permisosSeleccionados),
                        'borrar_area' => in_array('borrar_area', $permisosSeleccionados),
                        'agregar_activo' => in_array('agregar_activo', $permisosSeleccionados),
                        'eliminar_activo' => in_array('eliminar_activo', $permisosSeleccionados),
                        'editar_activo' => in_array('editar_activo', $permisosSeleccionados),
                        'crear_material' => in_array('crear_material', $permisosSeleccionados),
                    ]
                );
                PrincipalPermisos::updateOrCreate(
                    ['user_id' => $id], // Buscar el permiso por el ID de usuario
                    [
                        'user_id' => $id,
                        'crear_user' => in_array('crear_user', $permisosSeleccionados),
                        'dar_baja_item' => in_array('dar_baja_item', $permisosSeleccionados),
                        'crear_item' => in_array('crear_item', $permisosSeleccionados),
                        'borrar_item' => in_array('borrar_item', $permisosSeleccionados),
                        'editar_item' => in_array('editar_item', $permisosSeleccionados),
                        'exportar' => in_array('exportar', $permisosSeleccionados),
                        'crear_area' => in_array('crear_area', $permisosSeleccionados),
                        'editar_area' => in_array('editar_area', $permisosSeleccionados),
                        'borrar_area' => in_array('borrar_area', $permisosSeleccionados),
                        'agregar_activo' => in_array('agregar_activo', $permisosSeleccionados),
                        'eliminar_activo' => in_array('eliminar_activo', $permisosSeleccionados),
                        'editar_activo' => in_array('editar_activo', $permisosSeleccionados),
                        'crear_material' => in_array('crear_material', $permisosSeleccionados),
                    ]
                );
                return back()->with('success', 'Cuenta de usuario actualizado');
            } catch (\Exception $e) {
                // La conexión no existe
                return back()->with('error', 'La base de datos no existe');
            }
        }
        return redirect('admin/users')->with('success', 'Cuenta de usuario actualizado');
    }

    public function show($id)
    {
        $user = PrincipalUser::find($id);
        $permisos = PrincipalPermisos::where('user_id', $user->id)->first();
        return view('users.show', compact('user', 'permisos'));
    }

    // Inactiva al usuario
    public function destroy($id)
    {
        $user1 = PrincipalUser::find($id);
        $user1->estado = 'I';
        $user1->admin = false;
        $user1->update();
        $depar = Departamento::find($user1->dep_id);
        $userAuth = PrincipalUser::find(auth()->user()->id);
        if (in_array($depar->sigla, ['PO', 'SU', 'TJ', 'LP', 'CB', 'OR', 'SC', 'PA', 'BE']) && in_array($user1->instituto, ['u', 'i', 'c', 'cl'])) {
            $databaseConnection = "departamento_" . strtolower($depar->sigla);
            if ($user1->instituto !== 'u') {
                $databaseConnection .= '_' . strtolower($user1->instituto);
            }
            try {
                DB::connection($databaseConnection)->getPdo();
                config(['database.default' => $databaseConnection]);
                DB::reconnect();
                $user = User::find($id);
                $user->estado = 'I';
                $user->admin = false;
                $user->update();
                return back()->with('success', 'Se dio de baja la Cuenta');
            } catch (\Exception $e) {
                // La conexión no existe
                return back()->with('success', 'La base de datos no existe');
            }
        }
        return $userAuth->tipo_user == 1 ? back()->with('success', 'Se dio de baja la Cuenta') : redirect('/admin/error');
    }
    // Activa al usuario
    public function activarCuenta($id)
    {
        $user1 = PrincipalUser::find($id);
        $user1->estado = 'A';
        $user1->admin = true;
        $user1->update();
        $depar = Departamento::find($user1->dep_id);
        $userAuth = PrincipalUser::find(auth()->user()->id);
        if (in_array($depar->sigla, ['PO', 'SU', 'TJ', 'LP', 'CB', 'OR', 'SC', 'PA', 'BE']) && in_array($user1->instituto, ['u', 'i', 'c', 'cl'])) {
            $databaseConnection = "departamento_" . strtolower($depar->sigla);
            if ($user1->instituto !== 'u') {
                $databaseConnection .= '_' . strtolower($user1->instituto);
            }
            try {
                DB::connection($databaseConnection)->getPdo();
                config(['database.default' => $databaseConnection]);
                DB::reconnect();
                // Crea el usuario en la segunda base de datos con la misma ID
                $user = User::find($id);
                $user->estado = 'A';
                $user->admin = true;
                $user->update();
                $userAuth = User::find(auth()->user()->id);
                return back()->with('success', 'Se activo la Cuenta');
            } catch (\Exception $e) {
                // La conexión no existe
                return back()->with('success', 'La base de datos no existe');
            }
        }
        return $userAuth->tipo_user == 1 ? back()->with('success', 'Se activo la Cuenta') : redirect('/admin/error');
    }

    // Elimina al usaurio completamente
    public function eliminarCuenta($id)
    {
        $userP = PrincipalUser::find($id);
        if ($userP) {
            $permisoP = PrincipalPermisos::where('user_id', $userP->id);
            $permisoP->delete();
            $userP->delete();
        }
        $userAuth = User::find(auth()->user()->id);
        $depar = Departamento::find($userP->dep_id);
        if (in_array($depar->sigla, ['PO', 'SU', 'TJ', 'LP', 'CB', 'OR', 'SC', 'PA', 'BE']) && in_array($userP->instituto, ['u', 'i', 'c', 'cl'])) {
            $databaseConnection = "departamento_" . strtolower($depar->sigla);
            if ($userP->instituto !== 'u') {
                $databaseConnection .= '_' . strtolower($userP->instituto);
            }
            try {
                DB::connection($databaseConnection)->getPdo();
                config(['database.default' => $databaseConnection]);
                DB::reconnect();
                $user = User::find($id);
                if ($user) {
                    $permiso = Permiso::where('user_id', $user->id);
                    $permiso->delete();
                    $user->delete();
                }
                return $userAuth->tipo_user == 1 ? back()->with('success', 'Se elimino la cuenta') : redirect('/admin/error');
            } catch (\Exception $e) {
                // La conexión no existe
                return back()->with('success', 'La base de datos no existe');
            }
        }
        return $userAuth->tipo_user == 1 ? back()->with('success', 'Se elimino la cuenta') : redirect('/admin/error');
    }

    // Reset PAssword
    public function viewResetPassword($id)
    {
        $user = PrincipalUser::find($id);
        return view('users.reset', compact('user'));
    }

    public function resetPassword($id, Request $request)
    {
        $user1 = PrincipalUser::find($id);
        $user1->password = Hash::make($request->password);
        $user1->update();

        $depar = Departamento::find($user1->dep_id);
        if (in_array($depar->sigla, ['PO', 'SU', 'TJ', 'LP', 'CB', 'OR', 'SC', 'PA', 'BE']) && in_array($user1->instituto, ['u', 'i', 'c', 'cl'])) {
            $databaseConnection = "departamento_" . strtolower($depar->sigla);
            if ($user1->instituto !== 'u') {
                $databaseConnection .= '_' . strtolower($user1->instituto);
            }
            try {
                DB::connection($databaseConnection)->getPdo();
                config(['database.default' => $databaseConnection]);
                DB::reconnect();
                $user = User::find($id);
                $user->password = Hash::make($request->password);
                $user->update();
                return redirect('admin/users')->with('success', 'Se restablecio la contraseña');
            } catch (\Exception $e) {
                // La conexión no existe
                return back()->with('success', 'La base de datos no existe');
            }
        }
        return redirect('admin/users')->with('success', 'Se restablecio la contraseña');
    }

    public function actividadesUser()
    {
        $activity = Actividad::latest('created_at')->paginate(10);
        return view('historial.actividad', compact('activity'));
    }
}
