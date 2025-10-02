<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Celke</title>
</head>

<body>
    <h1>Cadastrar Usuário</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @else
        <p style="color: red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required value="{{ old('name') }}">
        <br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required value="{{ old('email') }}">
        <br>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required value="{{ old('password') }}">
        <br>

        <button type="submit">Cadastrar</button>

    </form>
</body>

</html>
