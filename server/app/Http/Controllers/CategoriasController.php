<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\EditCategoriaRequest;
use App\Categoria;

class CategoriasController extends Controller
{
    public function index(){
        return response()->json(Categoria::all()->produtos);
    }

    public function store(CreateCategoriaRequest $request){
        $categoria = Categoria::create($request->all());
        $categoria->save();
        return response()->json([
            'mensagem' => 'Categoria cadastrada com sucesso!'
        ], 201);
    }

    public function show($id){
    }

    public function update(EditCategoriaRequest $request, $id){
        $categoria = Categoria::find($id);
        $categoria->update([
            'name' => $request->name
        ]);
        return response()->json([
            'mensagem' => 'Categoria atualizada com sucesso'
        ], 200);
    }
    
    public function destroy($id){
        $categoria = Categoria::find($id);
        $categoria->delete();
        return response()->json([
            'mensagem' => 'Categoria excluída com sucesso'
        ], 200);
    }
}
