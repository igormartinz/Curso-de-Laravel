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
            </table>
        </div>

    </div>
@endsection
