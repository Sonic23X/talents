<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function access(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($login))
            return response()->json(['message' => 'Tu correo y/o contraseña no son correctos'], 401);
        else
            return response()->json(['url' => route('dashboard')], 200);
    }

    public function register()
    {
        # code...
    }

    public function create(Request $request)
    {
        # code...
    }

    public function recoveryPassword(Request $request)
    {
        return response()->json(['msg' => 'Correo de recuperación enviado'], 200);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}
