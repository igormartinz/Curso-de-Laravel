@extends('layouts.login')

@section('content')
    <h1 class="title-login">Recuperar a senha</h1>

    <x-alert />

    <form class="mt-4" method="POST" action="{{ route('password.email') }}">
        @csrf
        @method('POST')

        <div class="form-group-login">
            <label for="email" class="form-label-login">E-mail</label>
            <input type="email" name="email" id="email" class="form-input-login" value="{{ old('email') }}" required>
        </div>


        {{-- Link para recuperar senha --}}
        <div class="btn-group-login">
            <a href="{{ route('login') }}" class="link-login">Login</a>
            <button type="submit" class="btn-primary">Recuperar</button>
        </div>
    </form>
@endsection
