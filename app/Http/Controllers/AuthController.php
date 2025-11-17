<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginProcess(AuthRequest $request)
    {

        // Capturar passíveis exceções durante a execução.
        try {
            $authenticated = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

            if (!$authenticated) {
                return back()->withInput()->with('error', 'E-mail ou senha incorretos');
            }

            return redirect()->route('user.index');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'E-mail ou senha incorretos');
        }
    }

    public function logout(){

        // Delogar o usário
        Auth::logout();

        return redirect()->route('login');
    }
}
