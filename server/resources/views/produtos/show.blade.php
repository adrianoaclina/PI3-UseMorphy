@extends('layouts.app')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

<div class="wrapper">
  
  <div class="col-1-2">
    <div class="product-wrap">
      <div class="product-shot">
        <img src="https://s3-us-west-2.amazonaws.com/hypebeast-wordpress/image/2009/10/smart-magazine-stussy-stock-link-tshirt-3.jpg" alt="" />
      </div>
    </div>
  </div>
  
  <div class="col-1-2">
    <div class="product-info">
      {{-- <h2>{{$produto->nome}}</h2> --}}
      <div class="desc">
        {{$produto[0]->nome}}
      </div>
      <ul class="sizing-list">
        <li class="size">S</li>
        <li class="size active">M</li>
        <li class="size">L</li>
      </ul>
      <a href="" class="button">Add to Cart</a>
    </div>
    
  </div>
</div>

@endsection