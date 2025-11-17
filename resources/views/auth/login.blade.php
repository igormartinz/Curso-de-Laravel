@extends('layouts.login')

@section('content')
    <h1 class="title-login">Área Restrita</h1>

    <x-alert></x-alert>

    <form class="mt-4" method="POST" action="{{ route('login.process') }}">
        @csrf
        @method('POST')

        <div class="form-group-login">
            <label for="email" class="form-label-login">E-mail</label>
            <input type="email" name="email" id="email" class="form-input-login" value="{{ old('email') }}" required>
        </div>

        <div class="form-group-login">
            <label for="password" class="form-label-login">Senha</label>
            <input type="password" name="password" id="password" class="form-input-login" value="{{ old('password') }}"
                required>
        </div>

        
        {{-- Link para recuperar senha --}}
        <div class="btn-group-login">
            <a href="{{ route('password.request') }}" class="link-login">Esqueceu a senha?</a>
            <button type="submit" class="btn-primary">Acessar</button>
        </div>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ route('user.create') }}" class="link-login">Criar nova conta!</a>
    </div>
@endsection
