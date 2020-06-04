<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Carrinho;
use App\Produto;
use App\Http\Requests\CreatePedidoRequest;

class PedidosController extends Controller
{
    public function index(){
        return view('pedidos.index')->with('pedidos', Pedido::all()->where('user_id', auth()->user()->id)); 
    }

    public function store(){
        $user = auth()->user();
        $carrinho = $user->carrinho;

        $pedido = Pedido::create([
            'user_id' => $user->id,
            'total' => $carrinho->produtos->sum('preco'),
            'status' => 'aprovado'
        ]);
        $produtos = $carrinho->produtos;
        if($produtos){
            $pedido->produtos()->attach($produtos);
        }else{
            session()->flash('error', 'Adicione produtos no carrinho, para finalizar a compra');
        }
        
        
        session()->flash('success', 'O pedido ('.$pedido->id.') foi criado com sucesso.');
        
        return redirect(route('pedidos'));
    }

    public function cancel($id){
        $pedido = Pedido::find($id);
        $pedido->update([
            'status' => 'Cancelado'
        ]);

        return redirect()->back();
    }
}
