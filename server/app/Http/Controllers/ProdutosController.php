<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\CreateProdutoRequest;
use App\Produto;
use App\Categoria;
use App\Tag;
class ProdutosController extends Controller
{
    public function index(){
        return response()->json(Produto::all()->categoria);
    }

    public function store(CreateProdutoRequest $request){
        $image = $request->image->store('produtos');
        $produto = Produto::create($request->all());
        $produto->image = $image;
        $produto->save();
        return response()->json([
            'mensagem' => 'Produto cadastrado com sucesso!'
        ], 201);
    }

    public function show($id){
        $produto = Produto::find($id);
        $categoria = Produto::find($id)->categoria;
        // $tags = Produto::find($id)->tags;
        $array = [$produto, $categoria];
        return view('produtos.show')->with('produto', $array);
    }

    public function update(EditProdutoRequest $request, $id){

        $produto = Produto::find($id);
        $produto->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'desconto' => $request->desconto,
            'estoque' => $request->estoque,
            'categoria_id' => $request->categoria_id
        ]);

        if($request->imagem){
            //apaga imagem anterior
            Storage::delete($produto->imagem);

            //cria a imagem;
            $imagem = $request->imagem->store('produtos');

            //atualiza o endereço da imagem no banco
            $produto->imagem = $imagem;
            $produto->save();
        }
        return response()->json([
            'mensagem' => 'Produto atualizado com sucesso'
        ], 200);

    }
    public function destroy($id){
        $produto = Produto::find($id);
        $produto->delete();
        return response()->json([
            'mensagem' => 'Produto excluído com sucesso'
        ], 200);
    }
}
