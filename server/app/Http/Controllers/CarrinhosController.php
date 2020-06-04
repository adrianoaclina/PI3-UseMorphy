<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Carrinho;
use Illuminate\Http\Request;
use DB;

class CarrinhosController extends Controller
{
    public function index(){
        $user = auth()->user();
        $carrinho = $user->carrinho;
        //se o usuario não tiver carrinho, cria um carrinho vazio
        if($carrinho == null)
            $carrinho = $carrinho = Carrinho::updateOrCreate(['user_id' => $user->id]);

        return view('carrinho.index')->with('produtos', $carrinho->produtos);
    }

    public function store(Request $request){
        $user = auth()->user();
        $carrinho = Carrinho::updateOrCreate(['user_id' => $user->id]);
        $produto = Produto::all()->where('nome', $request->nome);

        DB::table('carrinho_produto')->insert([
            'carrinho_id' => $carrinho,
            'produto_id' => $produto_id,
            'quantidade' => $request->quantidade
            ]);

        session()->flash('success', 'O produto ('.$produto->nome.') foi adicionado no carrinho.');
        
        return redirect()->back();
    }

    public function destroy(Produto $produto){
        $user = auth()->user();
        $carrinho = $user->carrinho;

        DB::table('carrinho_produto')->where([['carrinho_id', $carrinho->id],['produto_id',$produto->id]])->delete();
        session()->flash('success', 'O produto ('.$produto->name.') foi removido do carrinho.');
        return redirect()->back();
    }
}
