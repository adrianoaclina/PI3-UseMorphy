@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        <h1 class="text-center">Meu cadastro</h1>
        <div class="card-body card col-md-12">

        <form class="justify-content-center" method="POST" action="{{ route('editPerfil', $user->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="name"
                        class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                        class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cpf"
                        class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                    <div class="col-md-6">
                        <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                            value="{{ $user->cpf }}" required autocomplete="cpf" autofocus>

                        @error('cpf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cpf"
                        class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                    <div class="col-md-6">
                        <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror"
                            name="telefone" value="{{ $user->telefone }}" required autocomplete="telefone" autofocus>

                        @error('telefone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password"
                        class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-outline-secondary">
                            {{ __('Salvar alterações') }}
                        </button>
                        <a href="{{route('store')}}" class="btn btn-outline-secondary">
                            {{ __('Voltar') }}
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
