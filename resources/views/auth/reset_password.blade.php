@extends('layouts.login')

@section('content')
    <h1 class="title-login">Nova Senha</h1>

    <x-alert />

    <form class="mt-4" method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('POST')

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group-login">
            <label for="email" class="form-label-login">E-mail</label>
            <input type="email" name="email" id="email" class="form-input-login" value="{{ old('email') }}" required>
        </div>

        <div class="form-group-login">
            <label for="password" class="form-label-login">Nova Senha</label>
            <input type="password" name="password" id="password" class="form-input-login" required>
        </div>

        <div class="form-group-login">
            <label for="password_confirmation" class="form-label-login">Confirmar Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-input-login" required>
        </div>

        <div class="btn-group-login">
            <a href="{{ route('login') }}" class="link-login">Login</a>
            <button type="submit" class="btn-primary">Atualizar</button>
        </div>
    </form>
@endsection