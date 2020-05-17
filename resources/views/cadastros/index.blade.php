@extends('layouts.app')
@section('content')
<h2 class="text-center">Cadastros do Sistema</h2>
<section class="row">
    <div class="col-md-3">
        <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('products.index') }}">Produtos</a></li>
            <li class="list-group-item"><a href="{{ route('categories.index') }}">Categorias</a>
            </li>
            <li class="list-group-item"><a href="{{ route('users.index') }}">Usuários</a>
            </li>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
</section>

@endsection