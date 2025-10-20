<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    // Listar os usuários
    public function index()
    {
        // Recuperar os registros do banco de dados
        $users = User::oldest('id')->paginate(3);

        // Carregar a VIEW
        return view('users.index', ['users' => $users]);
    }

    // Carregar o formulário cadastrar novo usuário
    public function create()
    {

        // Carregar a VIEW
        return view('users.create');
    }

    public function show(User $user)
    {

        return view('users.show', ['user' => $user]);
    }

    public function store(UserRequest $request)
    {
        // dd($request);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Usuário não cadastrado');
        }
    }

    public function edit(User $user)
    {

        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            return redirect()->route('user.index')->with('success', 'Usuário editado com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Usuário não editado');
        }
    }

    public function edit_password(User $user)
    {

        return view('users.edit-password', ['user' => $user]);
    }

    public function update_password(UserRequest $request, User $user)
    {
        try {
            $user->update([
                'password' => $request->password
            ]);

            return redirect()->route('user.index')->with('success', 'Senha do usuário editada com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Senha do usuário não editada');
        }
    }
}
