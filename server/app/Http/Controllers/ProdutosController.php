<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProdutoRequest;
use App\Http\Requests\EditProdutoRequest;
use App\Produto;
use App\Categoria;
use App\Tag;
use Illuminate\Support\Facades\Storage;
class ProdutosController extends Controller
{   
    public function __construct(){
        $this->middleware('VerifyCategoriasCount')->only(['create','store']);
    }
    public function index(){
        return view('produtos.index')->with('produtos',Produto::all());
    }

    public function create()
    {
        return view('produtos.create')->with('categorias', Categoria::all())->with('tags', Tag::all());
    }
    public function store(CreateProdutoRequest $request){
        $image = $request->imagem->store('produtos');
        $produto = Produto::create($request->all());

        //atualiza o endereço da imagem no banco
        $produto->imagem = $image;
        $produto->save();

        //salva os dados das tags
        if($request->tags){
            $produto->tags()->attach($request->tags);
        }
        session()->flash('success', 'Produto criado com sucesso!');
        return redirect(route('produtos.index'));
    }

    public function show($id){
        $produto = Produto::find($id);
        return view('produtos.show')->with('produto', $produto);
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit')->with('produto', $produto)->with('categorias', Categoria::all())->with('tags', Tag::all());
    }
    public function update(EditProdutoRequest $request, Produto $produto){

        $produto->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'desconto' => $request->desconto,
            'estoque' => $request->estoque,
            'categoria_id' => $request->categoria_id
        ]);

        $produto->tags()->sync($request->tags);
        if($request->imagem){
            //apaga imagem anterior
            Storage::delete($produto->imagem);

            //cria a imagem;
            $imagem = $request->imagem->store('produtos');

            //atualiza o endereço da imagem no banco
            $produto->imagem = $imagem;
            $produto->save();
        }
        session()->flash('success', 'Produto alterado com sucesso!');
        return redirect(route('produtos.index'));

    }
    public function destroy($id){
        $produto = Produto::find($id);
        Storage::delete($produto->image);
        $produto->delete();
        session()->flash('success', 'Produto removido com sucesso!');
        return redirect()->back();
    }
}
