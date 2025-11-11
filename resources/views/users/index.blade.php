@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="content-title">
            <h1 class="page-title">Listar os Usuário</h1>
            <div>
                <a href="{{ url('generate-pdf-users') . (request()->getQueryString() ? '?' . request()->getQueryString() : '')}}" class="btn-warning">Gerar PDF</a>
                <a href="{{ route('user.create') }}" class="btn-success">Cadastrar</a>
            </div>
        </div>

        <x-alert />

        <form class="form-search">
            <input type="text" class="form-input" name="name" placeholder="Digite o nome" value="{{ $name }}">
            <input type="text" class="form-input" name="email" placeholder="Digite o e-mail" value="{{ $email }}">

            <input type="datetime-local" class="form-input" name="start_date_registration" value="{{ $start_date_registration }}">
            <input type="datetime-local" class="form-input" name="end_date_registration" value="{{ $end_date_registration }}">

            <div class="flex gap-1">
                <button class="btn-primary">Pesquisar</button>
                <a href="{{ route('user.index') }}" class="btn-warning">Limpar</a>
            </div>
        </form>

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
                                <a href="{{ route('user.generate-pdf', ['user' => $user->id]) }}" class="btn-warning">Gerar
                                    PDF</a>

                                <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn-primary">Visualizar</a>
                                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn-warning">Editar</a>
                                <a href="{{ route('password.edit', ['user' => $user->id]) }}" class="btn-warning">Editar
                                    Senha</a>
                                <form id="delete-form-{{ $user->id }}"
                                    action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="button" class="btn-danger"
                                        onclick="confirmDelete({{ $user->id }})">Apagar</button>
                                </form>
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
