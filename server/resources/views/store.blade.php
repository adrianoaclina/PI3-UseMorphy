@extends('layouts.app')
@section('content')
@section('javascript')
    <script>
        window.onload = function() {
            $('.tags_select2').select2();
        };
    </script>
@endsection
@section('css')
    <style>
      .preco-antigo{
          text-decoration: line-through;
      }  
    </style>
@endsection
<link rel="stylesheet" href="..\css\app.css">
<div class="jumbotron asection-a"
    style="background-image: url('{{ asset('imagens/banner-loja-camiseta.jpg') }}')">
</div>
<div class="asection-a bg">
    <div class="acontainer-a">
        <h1>Camisetas em promoção</h1>
        @foreach($produtos as $produto)
            <div class="col three bg">
                <div class="imgholder"><img src="{{asset('storage/'.$produto->imagem) }}" width="366" height="400"></div>
                <h1 class="feature mt-2">{{ $produto->nome }}</h1>
                <div class="row justify-content-center">
                    <span class="preco-antigo">{{$produto->preco()}}</span>
                    <p>{{$produto->precoDesconto()}}</p>
                </div>
                <p><a href="{{ route('produtos.show', $produto->id) }}"
                            class="btn btn-outline-secondary">Comprar</a>
                    </p>
            </div>
        @endforeach
        <div class="group"></div>
    </div>
</div>
@endsection