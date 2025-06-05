<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if ($request->email != 'super.user@gmail.com') {
            $sigla = $request->input('departamento');
            $instituto = $request->input('institucion');
            $userMain = User::where('email', $request->email)->first();
            if ($userMain) {
                if (in_array($sigla, ['PO', 'SU', 'TJ', 'LP', 'CB', 'OR', 'SC', 'PA', 'BE']) && in_array($instituto, ['U', 'I', 'C', 'CL'])) {
                    $databaseConnection = "departamento_" . strtolower($sigla);
                    if ($instituto !== 'U') {
                        $databaseConnection .= '_' . strtolower($instituto);
                    }
                    try {
                        DB::connection($databaseConnection)->getPdo();
                        config(['database.default' => $databaseConnection]);
                        DB::reconnect();
                        $userDepartment = User::where('email', $request->email)->first();
                        if ($userDepartment) {
                            if ($userDepartment->email == $userMain->email && password_verify($request->password, $userDepartment->password) && password_verify($request->password, $userMain->password)) {
                                Auth::loginUsingId($userMain->id);
                                return redirect('/');
                            }
                            return back()->with('success', 'Credenciales inválidas');
                        } else {
                            return back()->with('success', 'El correo no existe');
                        }
                    } catch (\Exception $e) {
                        //dd($e->getMessage());
                        // La conexión no existe
                        return back()->with('success', 'La base de datos no existe');
                    }
                }
                return back()->with('success', 'Credenciales inválidas o Departamento no válido');
            } else {
                return back()->with('success', '¡No existe el correo!');
            }
        } else {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            // Intento de autenticación
            if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])) {
                return redirect('/');
            }
            return back()->withErrors(['email' => 'Credenciales incorrectas']);
        }
    }

}
