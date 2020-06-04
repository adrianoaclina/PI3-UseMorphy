@extends('home')
@section('lista')
<h2>Lista de Categorias</h2>
<div class="d-flex justify-content-end">
    <a href="{{ route('categorias.create') }}" class="btn btn-success mb-2">Nova Categoria</a>
</div>
<ul class="list-group">
    @foreach($categorias as $categoria)
    <li class="list-group-item">
        <span>{{$categoria->nome}}</span>
        <span>({{$categoria->produtos()->count()}})</span>
        
            <a href="#" class="btn btn-primary btn-sm float-right ml-1">Visualizar</a>
            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm float-right ml-1">Editar</a>
        <form action="{{ route('categorias.destroy', $categoria->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Você tem certeza que quer apagar?')">
            @csrf
            @method('DELETE')
            <button type="submit" href="#" class="btn btn-danger btn-sm float-right">Remover</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection