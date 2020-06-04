<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\EditCategoriaRequest;

class CategoriasController extends Controller
{
    public function __construct(){
    }
    
    public function index()
    {
        return view('categorias.index')->with('categorias',Categoria::all());
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(CreateCategoriaRequest $request)
    {
        Categoria::create($request->all());
        session()->flash('success', 'Categoria criada com sucesso!');
        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit')->with('categoria', $categoria);
    }

    public function update(EditCategoriaRequest $request, Categoria $categoria)
    {
        $categoria->update([
            'nome' => $request->name
        ]);

        session()->flash('success', 'Categoria alterada com sucesso!');
        return redirect(route('categorias.index'));
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        $produto_count = $categoria->produtos()->count();
        if($categoria->produtos()->count() > 0){
            session()->flash('error', 'Não pode ser apagada pois temos ('.$produto_count.') produto(s) com essa categoria');
            return redirect()->back();
        }
        $categoria->delete();
        session()->flash('success', 'Categoria movida para lixeira com sucesso!');
        return redirect()->back();
    }
}
