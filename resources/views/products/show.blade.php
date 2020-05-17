@extends('layouts.app')
@section('content')
    <h2>{{$product->name}}</h2>
    <div class="row">
        <div class="col-md-6">
            <img src="" alt="">
        </div>
        <div class="col-md-6">
        <span>Preço: {{$product->price}}</span><br>
        <span>Estoque: {{$product->stock}}</span><br>
        <span>Desconto: {{$product->discount}}</span>
        </div>
    </div>
@endsection