<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;

class UserController extends Controller
{

    // Listar os usuários
    public function index(){
        // Recuperar os registros do banco de dados
        $users = User::orderByDesc('id')->paginate(10);

        // Carregar a VIEW
        return view('users.index', ['users' => $users]);
    }

    // Carregar o formulário cadastrar novo usuário
    public function create()
    {

        // Carregar a VIEW
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        // dd($request);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            return redirect()->route('user.create')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Usuário não cadastrado');
        }
    }
}
