<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;
use App\Tag;

class StoreController extends Controller
{
    public function index(){
        return view('store')->with('produtos', Produto::all()->sortByDesc('preco')->take(3));
    }

    public function buscaCategoria(Categoria $categoria){
        return view('search')->with('produtos', $categoria->produtos()->paginate(3))->with('title', $categoria->nome);
    }

    public function buscaTag(Tag $tag){
        return view('search')->with('produtos', $tag->produtos()->paginate(3))->with('title', $tag->nome);
    }

    public function buscaProduto(Request $request){
        $search = $request->query('s');

        if($search){
            $produtos = Produto::where('nome','LIKE',"%{$search}%");
            return view('search')->with('produtos', $produtos->paginate(1))->with('title', $search);
        }else{
            session()->flash('error', 'Você precisa digitar o nome de algum produto.');
            return redirect()->back();
        }        
    }
}
