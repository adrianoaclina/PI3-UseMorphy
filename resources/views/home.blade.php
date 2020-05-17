@extends('layouts.store')
@section('css')
<style>
    .banner {
        min-height: 400px;
        background: url('http://via.placeholder.com/2000x800');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
@endsection
@section('content')
<main class="container">
    <section class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1>PROMOÇÃO RELÂMPAGO</h1>
            <p class="lead">Todas as peças com 25% de desconto até o fim do dia!</p>
        </div>
    </section>
    <section class="container py-4">
        <div class="row">
            <div class="mx-auto col-10 text-center">
                <h2 class="text-uppercase">Nossos Produtos</h2>
                <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum, nobis!</p>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="mx-auto col-sm-10 col-md-6 col-lg-3">
                    <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid">
                    <span class="d-block h6 text-center mt-3">{{ $product->name }}</span>
                    <div class="text-center">
                        <span class="text-muted old-price">{{$product->price()}}</span>
                        <span>{{ $product->discountPrice() }}</span>
                    </div>
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-primary btn-sm">Visualizar</a>
                        <a href="#" class="btn btn-secondary btn-sm">Comprar</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    
</main>
@endsection
