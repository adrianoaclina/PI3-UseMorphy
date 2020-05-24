<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Carrinho;
use Illuminate\Http\Request;

class CarrinhosController extends Controller
{
    public function index(){

        $carrinho = $user->carrinho;
        //se o usuario não tiver carrinho, cria um carrinho vazio
        if($carrinho == null)
            $carrinho = $carrinho = Carrinho::updateOrCreate(['user_id' => $user->id]);

        return view('carts.index')->with('products', $cart->products);
    }

    public function store(Produto $produto){
        $carrinho = Carrinho::updateOrCreate(['user_id' => $user->id]);

        //O produto já está no carrinho
        if($carrinho->produtos()->where('produto_id', $produto->id)->count()){
        }else{
            $carrinho->produtos()->saveMany([$produto]);
        }
        return response()->json([
            'mensagem' => 'Carrinho atualizado com sucesso'
        ], 201);
    }

    public function destroy(Produto $produto){
        $carrinho = $user->carrinho;

        DB::table('carrinho_produto')->where([['carrinho_id', $carrinho->id],['produto_id',$produto->id]])->delete();
        
        return response()->json([
            'mensagem' => 'Excluído do carrinho com sucesso!'
        ], 200);
    }
}
