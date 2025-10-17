@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="content-title">
            <h1 class="page-title">Cadastrar Usuário</h1>
            <a href="{{ route('user.index') }}" class="btn-info">Listar</a>
        </div>

        <x-alert/>

        <form action="{{ route('user.store') }}" method="post" class="form-container">
            @csrf

            <div class="mb-4">
                <label class="form-label" for="name">Nome:</label>
                <input class="form-input" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>

            <div class="mb-4">
                <label class="form-label" for="email">E-mail:</label>
                <input class="form-input" type="text" name="email" id="email" value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label class="form-label" for="password">Senha:</label>
                <input class="form-input" type="password" name="password" id="password"
                    value="{{ old('password') }}">
            </div>

            <button type="submit" class="btn-success">Cadastrar</button>

        </form>
    </div>
@endsection
