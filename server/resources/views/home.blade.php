@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('produtos.index') }}">Produtos</a></li>
                <li class="list-group-item"><a href="{{ route('categorias.index') }}">Categorias</a></li>
                <li class="list-group-item"><a href="{{ route('tags.index') }}">Tags</a></li>
                <li class="list-group-item"><a href="{{ route('config') }}">Usuários</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            @yield('lista')
        </div>
    </div>
</div>
@endsection
