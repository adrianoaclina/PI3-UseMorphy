@extends('home')
@section('javascript')
    <script>
        window.onload = function() {
            $('.tags_select2').select2();
        };
    </script>
@endsection
@section('lista')
<section class="container">
<h2>Cria Produto</h2>
<form action="{{ route('produtos.store') }}" class="bg-white p-3" method="POST" enctype="multipart/form-data">
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
        <input type="text" class="form-control" name="nome" placeholder="Digite o nome do produto" value="{{ old('nome') }}">
    </div>
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea class="form-control" name="descricao" placeholder="Digite a descrição do produto">{{ old('descricao') }}</textarea>
    </div>
    <div class="form-group">
        <label for="categoria">Categoria:</label>
        <select name="categoria_id" class="form-control">
            @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" class="form-control" name="preco" value="{{ old('preco') }}">
    </div>
    <div class="form-group">
        <label for="desconto">Desconto:</label>
        <input type="number" class="form-control" name="desconto" value="{{ old('desconto') }}">
    </div>
    <div class="form-group">
        <label for="estoque">Número de produtos em estoque:</label>
        <input type="number" class="form-control" name="estoque" value="{{ old('estoque') }}">
    </div>
    <div class="form-group">
        <label for="tags">Tags:</label>
        <select name="tags[]" class="form-control tags_select2" multiple>
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">Imagem:</label>
        <input type="file" class="form-control" name="imagem" value="null">
    </div>
    <button type="submit" class="btn btn-success">Criar produto</button>
</form>
</section>
@endsection