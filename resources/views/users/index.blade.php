@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="content-title">
            <h1 class="page-title">Listar os Usuário</h1>
            <a href="{{ route('user.create') }}" class="btn-success">Cadastrar</a>

        </div>

        <x-alert />

        <div class="table-container">
            <table class="table">
                <tr class="table-header">
                    <th class="table-header">ID</th>
                    <th class="table-header">Nome</th>
                    <th class="table-header">E-mail</th>
                    <th class="table-header center">Ações</th>
                </tr>
                <tbody class="table-body">
                    @forelse ($users as $user)
                        <tr class="table-row">
                            <td class="table-cell">{{ $user->id }}</td>
                            <td class="table-cell">{{ $user->name }}</td>
                            <td class="table-cell">{{ $user->email }}</td>
                            <td class="table-actions">
                                <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn-primary">Visualizar</a>
                                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn-warning">Editar</a>
                                <a href="{{ route('password.edit', ['user' => $user->id]) }}" class="btn-warning">Editar Senha</a>
                                <a href="" class="btn-danger">Apagar</a>
                            </td>
                        </tr>
                    @empty
                        <div class="alert-error">Nenhum usuário encontrado</div>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $users->links() }}
        </div>
    </div>
@endsection
