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
<div class="asection-a bg">
    <h1 class="text-center">{{ $title }}</h1>
    <div class="acontainer-a">
        @forelse($produtos as $produto)
            <div class="col three bg">
                <div class="imgholder"><img src="{{ asset('storage/'.$produto->imagem) }}"
                        width="366" height="400"></div>
                <h1 class="feature mt-2">{{ $produto->nome }}</h1>
                <div class="row justify-content-center">
                    <span class="preco-antigo">{{ $produto->preco() }}</span>
                    <p>{{ $produto->precoDesconto() }}</p>
                </div>
                <p>
                    <a href="{{ route('produtos.show', $produto->id) }}"
                        class="btn btn-outline-secondary">Comprar</a>
                </p>
            </div>
        @empty
        <p class="mt-4 text-center">Não foi encontrado nenhum produto com o filtro <strong>{{ $title }}</strong></p>
        @endforelse
        <div class="group"></div>
    </div>
</div>
<div class="d-flex justify-content-center mt-4">
    {{ $produtos->appends(['s' => request()->query('s')])->links() }}
</div>
</section>
@endsection
