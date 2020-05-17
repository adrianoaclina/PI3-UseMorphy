@extends('layouts.app')
@section('content')
<section class="row">
    <div class="col-md-3">
        <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('products.index') }}">Produtos</a></li>
            <li class="list-group-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
            <li class="list-group-item"><a href="{{ route('users.index') }}">Usuários</a>
            </li>
        </ul>
    </div>
    <div class="col-md-9">
        <h2>Lista de Categories</h2>
        <div class="d-flex justify-content-end">
            <a href="{{ route('categories.create') }}" class="btn btn-success mb-2">Nova Categoria</a>
        </div>
        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item">
                    <span>{{ $category->name }}</span>
                    <a href="#" class="btn btn-primary btn-sm float-right ml-1">Visualizar</a>
                    <a href="{{ route('categories.edit', $category->id) }}"
                        class="btn btn-warning btn-sm float-right ml-1">Editar</a>
                    <form action="{{ route('categories.destroy', $category->id) }}"
                        class="d-inline" method="POST" onsubmit="return confirm('Você tem certeza que quer apagar?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" href="#" class="btn btn-danger btn-sm float-right">Remover</a>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection
