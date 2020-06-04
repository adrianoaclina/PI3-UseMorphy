@extends('home')
@section('lista')
<h1 class="text-center mb-5">Permissões do sistema</h1>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ 1 }}</th>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('change-admin', $user->id) }}" class="d-inline"
                        method="POST" onsubmit="return confirm('Você tem certeza que quer atualizar o Admin?')">
                        @csrf
                        @method('PUT')
                        <button type="submit" href="#"
                            class="btn btn-sm ml-1 {{ $user->isAdmin() ? 'btn-danger' : 'btn-primary' }}">
                            {{ $user->isAdmin() ? 'Remover Admin' : 'Adicionar Admin' }}
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
