@extends('home')
@section('javascript')
    <script>
        window.onload = function() {
            $('.tags_select2').select2();
        };
    </script>
@endsection
@section('lista')
<h2>Editar Produto</h2>
<form action="{{ route('produtos.update', $produto->id) }}" class="bg-white p-3" method="POST" enctype="multipart/form-data">
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
        <input type="text" class="form-control" name="nome" placeholder="Digite o nome do produto" value="{{ $produto->nome }}">
    </div>
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea class="form-control" name="descricao" placeholder="Digite a descrição do produto">{{ $produto->descricao }}</textarea>
    </div>
    <div class="form-group">
        <label for="categoria">Categoria:</label>
        <select name="categoria_id" class="form-control">
            @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}" @if($categoria->id == $produto->categoria_id) selected @endif>
                {{$categoria->nome}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" class="form-control" name="preco" value="{{ $produto->preco }}">
    </div>
    <div class="form-group">
        <label for="desconto">Desconto:</label>
        <input type="number" class="form-control" name="desconto" value="{{ $produto->desconto }}">
    </div>
    <div class="form-group">
        <label for="estoque">Número de produtos em estoque:</label>
        <input type="number" class="form-control" name="estoque" value="{{ $produto->estoque }}">
    </div>
    <div class="form-group">
        <label for="tags">Tags:</label>
        <select name="tags[]" class="form-control tags_select2" multiple>
            @foreach($tags as $tag)
            <option value="{{$tag->id}}" {{ $produto->hasTag($tag->id) ? 'selected' : '' }}>
                {{$tag->nome}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="imagem">Imagem:</label>
        <input type="file" class="form-control" name="imagem">
    </div>
    <button type="submit" class="btn btn-success">Salvar produto</button>
</form>
@endsection