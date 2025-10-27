@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="content-title">
            <h1 class="page-title">Detalhes do Usuário</h1>
            <span class="flex space-x-1">
                <a href="{{ route('user.index') }}" class="btn-info">Listar</a>
                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn-warning">Editar</a>
                <a href="{{ route('password.edit', ['user' => $user->id]) }}" class="btn-warning">Editar Senha</a>
                <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', ['user' => $user->id]) }}"
                    method="POST">
                    @csrf
                    @method('delete')

                    <button type="button" class="btn-danger" onclick="confirmDelete({{ $user->id }})">Apagar</button>
                </form>
            </span>
        </div>

        <x-alert />

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Informações do Usuário</h2>
            <div class="text-gray-700">
                <span class="font-bold">ID: </span><span>{{ $user->id }}</span>
            </div>
            <div class="text-gray-700">
                <span class="font-bold">Nome: </span><span>{{ $user->name }}</span>
            </div>
            <div class="text-gray-700">
                <span class="font-bold">Email: </span><span>{{ $user->email }}</span>
            </div>
            <div class="text-gray-700">
                <span class="font-bold">Criado em: </span><span>{{ $user->created_at }}</span>
            </div>
            <div class="text-gray-700">
                <span class="font-bold">Editado em: </span><span>{{ $user->updated_at }}</span>
            </div>
        </div>
    </div>
@endsection
