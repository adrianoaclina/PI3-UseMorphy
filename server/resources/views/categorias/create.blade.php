@extends('home')
@section('lista')
<h2>Cria Categorias</h2>
<form action="{{ route('categorias.store') }}" class="bg-white p-3" method="POST">
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
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" placeholder="Digite o nome da categoria" value="{{ old('nome') }}">
    </div>
    <button type="submit" class="btn btn-success">Criar categoria</button>
</form>
@endsection