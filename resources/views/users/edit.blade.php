@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="content-title">
            <h1 class="page-title">Editar Usuário</h1>
            <span>
                <a href="{{ route('user.index') }}" class="btn-info">Listar</a>
                <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn-primary">Visualizar</a>
                <a href="{{ route('password.edit', ['user' => $user->id]) }}" class="btn-warning">Editar Senha</a>
            </span>
        </div>

        <x-alert />

        <form action="{{ route('user.update', ['user' => $user]) }}" method="post" class="form-container">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="form-label" for="name">Nome:</label>
                <input class="form-input" type="text" name="name" id="name"
                    value="{{ old('name', $user->name) }}">
            </div>

            <div class="mb-4">
                <label class="form-label" for="email">E-mail:</label>
                <input class="form-input" type="text" name="email" id="email"
                    value="{{ old('email', $user->email) }}">
            </div>

            <button type="submit" class="btn-warning">Salvar</button>

        </form>
    </div>
@endsection
