@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="content-title">
            <h1 class="page-title">Editar Senha do Usuário</h1>
            <span>
                <a href="{{ route('user.index') }}" class="btn-info">Listar</a>
                <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn-primary">Visualizar</a>
                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn-warning">Editar</a>
            </span>
        </div>

        <x-alert />

        <form action="{{ route('password.update', ['user' => $user]) }}" method="POST" class="form-container">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="form-label" for="password">Senha:</label>
                <input class="form-input" type="text" name="password" id="password">
            </div>

            <button type="submit" class="btn-warning">Salvar</button>

        </form>
    </div>
@endsection
