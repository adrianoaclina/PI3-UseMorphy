@extends('home')
@section('lista')
<h2>Editar Categorias</h2>
<form action="{{ route('categorias.update', $categoria->id) }}" class="bg-white p-3" method="POST">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" placeholder="Digite o nome da categoria" value="{{ $categoria->nome }}">
    </div>
    <button type="submit" class="btn btn-success">Editar categoria</button>
</form>
@endsection