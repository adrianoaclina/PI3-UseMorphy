@extends('layouts.app')
@section('header-categoria')

@endsection
@section('content')

<link rel="stylesheet" href="..\css\app.css">
<div class="jumbotron asection-a"
    style="background-image: url('{{ asset('imagens/moodboard.jpg') }}')">
    <div class="slider-a">
        <div class="acontainer-a slidercontent">
            <h1 class="hero-a">Promoção de Inauguração</h1>
            <h2 class="hero-a">Todos os itens da loja</h2>
            <div class="call" style="text-align: center"><span>Pela metade do preço</span></div>
        </div>
    </div>
</div>
<div class="asection-a bg">
    <div class="acontainer-a">
        <h1>Camisetas em promoção</h1>
        @foreach($produtos as $produto)
            <div class="col three bg">
                <div class="imgholder">{{ $produto->imagem }}</div>
                <h1 class="feature mt-2">{{ $produto->nome }}</h1>
                <p><a href="{{ route('produto-show', $produto->id) }}"
                        class="btn btn-outline-secondary">Comprar</a></p>
            </div>
            @if($produto->id % 3 == 0)
                <div class="group margin"></div>
            @endif
        @endforeach
        <div class="group"></div>
    </div>
</div>
@endsection