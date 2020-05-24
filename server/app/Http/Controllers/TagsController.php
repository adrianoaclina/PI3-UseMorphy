<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\EditTagRequest;
use App\Tag;

class TagsController extends Controller
{
    public function index(){
        return response()->json(Tag::all()->produtos);
    }

    public function store(CreateTagRequest $request){
        $tag = Tag::create($request->all());
        $tag->save();
        return response()->json([
            'mensagem' => 'Tag cadastrada com sucesso!'
        ], 201);
    }

    public function show($id){
    }

    public function update(EditTagRequest $request, $id){
        $tag = Tag::find($id);
        $tag->update([
            'nome' => $request->nome
        ]);
        return response()->json([
            'mensagem' => 'Tag atualizada com sucesso'
        ], 200);
    }
    
    public function destroy($id){
        $tag = Tag::find($id);
        $tag->delete();
        return response()->json([
            'mensagem' => 'Tag excluída com sucesso'
        ], 200);
    }
}
