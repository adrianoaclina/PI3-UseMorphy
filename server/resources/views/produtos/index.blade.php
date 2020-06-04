@extends('home')
@section('lista')
<h2>Lista de Produtos</h2>
<div class="d-flex justify-content-end">
    <a href="{{ route('produtos.create') }}" class="btn btn-success mb-2">Novo Produto</a>
</div>
<ul class="list-group">
    @foreach($produtos as $produto)
    <li class="list-group-item">
        <img src="{{ asset('storage/'.$produto->imagem) }}" width="40" height="40">
        <span>{{$produto->nome}}</span>
        <a href="{{route('produtos.show', $produto->id)}}" class="btn btn-primary btn-sm float-right ml-1">Visualizar</a>
        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm float-right ml-1">Editar</a>
        <form action="{{ route('produtos.destroy', $produto->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Você tem certeza que quer apagar?')">
            @csrf
            @method('DELETE')
            <button type="submit" href="#" class="btn btn-danger btn-sm float-right">Remover</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection