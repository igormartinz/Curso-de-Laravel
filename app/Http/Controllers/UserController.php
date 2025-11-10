<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\UserPdfMail;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

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

    public function destroy(User $user)
    {
        try {
            $user->delete();

            return redirect()->route('user.index')->with('success', 'Usuário excluído com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('user.index')->with('error', 'Usuário não excluído');
        }
    }

    public function generatePdf(User $user){
        try{
            //Carregar a string com HTML/conteúdo e determinar a orientação e o tamanho do arquivo
            $pdf = Pdf::loadView('users.generate-pdf', ['user' => $user])->setPaper('a4', 'portrait');
    
            // Definir o caminho temporário para salvar o arquivo
            $pdfPath = storage_path("app/public/view_user_{$user->id}.pdf");

            // Salvar o PDF localmente
            $pdf->save($pdfPath);

            // Enviar e-mail com o PDF anexado
            Mail::to($user->email)->send(new UserPdfMail($pdfPath, $user));

            // Remover o arquivo após o envio do e-mail
            if(file_exists($pdfPath)){
                unlink($pdfPath);
            }

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('user.show', ['user' => $user->id])->with('success', 'E-mail enviado com sucesso');

        }catch(Exception $e){
            return redirect()->route('user.show', ['user' => $user->id])->with('error', 'E-mail não enviado!');
        }
    }

    public function generatePdfUsers(User $users){
        
        $users = User::all();

        $pdf = Pdf::loadView('users.generate-pdf-users', ['users' => $users])->setPaper('a4', 'portrait');

        // Fazer o download do arquivo
        return $pdf->download("lista-.pdf");
    }
}
