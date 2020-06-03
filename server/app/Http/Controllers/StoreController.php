<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;

class StoreController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('store')->with('produtos', $produtos)->with('categorias', $categorias);
    }
}
