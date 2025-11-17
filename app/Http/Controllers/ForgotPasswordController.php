<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot_password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Validar o formulario
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Campo e-mail é obrigatório!',
            'email.email' => 'Necessário enviar e-amil válido!'
        ]);

        // Veriricar se existe usuário no banco de dados com o e-mail
        $user = User::where('email', $request->email)->first();

        if (!$user) {

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'E-mail não encontrado!');
        }
        
        try {
            // Salvar o token recuperar senha e enviar e-mail
            Password::sendResetLink(
                // Retorna um arrat associativo contendo apenas o campo "email" da requisição
                $request->only('email')
            );

            return redirect()->route('login')->with('success', 'Enviado e-mail com instruções para recuperar a senha. Acesse sua caixa de e-mail para recuperar a senha!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Tente mais tarde!');
        }
    }

    // Carregar o formulário de atualizar senha
    public function showRequestForm(Request $request){
        try{
            // Recuperar os dadoss do usuário no banco de dados através do e-mail
            $user = User::where('email', $request->email)->first();

            // Verificar se encontrou o usúario no BD e o token é válido
            if(!$user || !Password::tokenExists($user, $request->token)){
                return redirect()->route('login')->with('error', 'Token inválido ou expirado!');
            }

            // Carregar a VIEW
            return view('auth.reset_password', ['token' => $request->token, 'email' => $request->email]);
        }catch(Exception $e){

            // Redirecionar o usuário e com mensagem de erro
            return redirect()->route('login')->with('error', 'Token inválido ou expirado!');
        }
    }

    public function reset(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        try{
            // reset - Redefinir a senha do usuário
            $status = Password::reset(
                // only - Recuperar apenas os campos específicos do pedido:
                // 'email', 'password', 'password_confirmation' e 'token'
                $request->only('email', 'password', 'password_confirmation', 'token'),

                // Retornar o callback se a redefinição de senha form bem-sucedida
                function(User $user, string $password){
                    // forceFill - Forçar o acesso a atributos protegidos
                    $user->forceFill([
                        'password' => $password
                    ]);

                    // Salvar as alterações
                    $user->save();
                }
            );

            return $status === Password::PASSWORD_RESET ? redirect()->route('login')->with('success', 'Senha atualizado com sucesso!') : redirect()->route('login')->with('error', 'Senha não atualizada!');
        }catch(Exception $e){
            back()->withInput()->with('error', 'Tente mais tarde!');
        }
    }
}
