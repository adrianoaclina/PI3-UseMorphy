@extends('layouts.app')
@section('content')
<h2>Carrinho de compra</h2>
<section class="container py-4">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Produto</th>
                <th>Tamanho</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Remover</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
            <td><a href="{{ route('produtos.show', $produto->id) }}">{{ $produto->nome }}</a></td>
                <td>{{$produto->tamanho}}</td>
                <td>{{ $produto->preco }}</td>
                <td><input name="quantidade" type="number" value="{{DB::table('carrinho_produto')->select('quantidade')->where('produto_id', $produto->id)->get(0)[0]->quantidade}}">Qntd</td>
                <td><a href="{{ route('carrinho-remove', $produto->id) }}" class="btn btn-danger btn-sm">Remover</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{route('pedido-store')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary btn-lg">Finalizar compra</button>
    </form>
</section>
@endsection 