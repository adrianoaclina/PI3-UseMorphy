@extends('layouts.app')
@section('javascript')
    <script>
        window.onload = function() {
            $('.tags_select2').select2();
        };
    </script>
@endsection
@section('content')
<link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        
<section class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">{{$produto->categoria->nome}}</li>
        <li class="breadcrumb-item active" aria-current="page">{{$produto->nome}}</li>
    </ol>
    <div class="row">
        @if($produto)
            <div class="col-md-6">
                <div>
                    <div>
                        <img src="{{ asset('storage/'.$produto->imagem) }}" width="540"
                            height="700">
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                
                    <h2>{{ $produto->nome }}</h2>
                    <p>{{ $produto->descricao}}</p>
                    <div class="form-group text-center ">
                        <label for="tamanho">Tamanho:</label>
                        <select name="tamanho" class="form-control tags_select2">
                            <option value="PP">PP</option>
                            <option value="P">P</option>
                            <option value="M">M</option>
                            <option value="G">G</option>
                            <option value="GG">GG</option>
                        </select>
                    </div>

                    </select>
                    <a href="{{route('carrinho-store', $produto->id)}}" class="btn btn-secondary">Comprar</a>

            </div>
        @else
            <p class="text-center">Não foi encontrado o produto</p>
        @endif

    </div>
</section>
@endsection