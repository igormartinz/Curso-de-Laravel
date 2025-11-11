<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    </title>
</head>

<body style="font-size: 12px;">

    <h2 style="text-align: center">Lista Usuários</h2>

    @forelse ($users as $user)
        ID: {{ $user->id }}<br>
        Nome: {{ $user->name }}<br>
        Email: {{ $user->email }}<br>
        Data de Cadastro: {{ $user->created_at }}<br>
        <br>
    @empty
        Nenhum usuário encontrado
    @endforelse

</body>

</html>
