@extends('layouts.app')
@section('content')
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container">
    <h1 class="text-center">Meus pedidos</h1>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Pedido</th>
                <th>Itens</th>
                <th>Total</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pedidos as $pedido)
                <tr data-toggle="collapse" data-target="#demo{{ $pedido->id }}" class="accordian-toggle">
                    <th scope="row">{{ $pedido->id }}</th>
                    <td>{{ $pedido->produtos()->count() }}</td>
                    <td>{{ $pedido->total }}</td>
                    <td>{{ $pedido->status }}</td>
                    <td>
                        <form action="{{ route('pedido-cancel', $pedido->id) }}"
                            class="d-inline" method="POST"
                            onsubmit="return confirm('Você tem certeza que quer cancelar seu pedido?')">
                            @csrf
                            @method('PUT')
                            <button type="submit" href="#" class="btn btn-sm ml-1 btn-danger">
                                Cancelar Pedido
                            </button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <div class="accordian-body collapse" class="hiddenRow" id="demo{{ $pedido->id }}">
                            <ul class="list-group">
                                @foreach($pedido->produtos as $produto)
                                    <li class="list-group-item">
                                        <img src="{{ asset('storage/'.$produto->imagem) }}"
                                            width="40" height="40">
                                        <span>{{ $produto->nome }}</span>
                                        <span>{{ $produto->descricao }}</span>
                                        <span>{{ $produto->preco }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <p>opa</p>
                        </div>
                    </td>
                </tr>
            @empty
                <p class="mt-4">Você ainda não tem pedidos!</p>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
