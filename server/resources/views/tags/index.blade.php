@extends('home')
@section('lista')
<h2>Lista de Tags</h2>
<div class="d-flex justify-content-end">
    <a href="{{ route('tags.create') }}" class="btn btn-success mb-2">Nova Tag</a>
</div>
<ul class="list-group">
    @foreach($tags as $tag)
        <li class="list-group-item">
            <span>{{ $tag->nome }}</span>
            <span>({{ $tag->produtos()->count() }})</span>
            <a href="#" class="btn btn-primary btn-sm float-right ml-1">Visualizar</a>
            <a href="{{ route('tags.edit', $tag->id) }}"
                class="btn btn-warning btn-sm float-right ml-1">Editar</a>
            <form action="{{ route('tags.destroy', $tag->id) }}" class="d-inline"
                method="POST" onsubmit="return confirm('Você tem certeza que quer apagar?')">
                @csrf
                @method('DELETE')
                <button type="submit" href="#" class="btn btn-danger btn-sm float-right">Remover</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
