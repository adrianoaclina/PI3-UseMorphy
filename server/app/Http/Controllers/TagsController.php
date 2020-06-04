<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\EditTagRequest;

class TagsController extends Controller
{
    public function index()
    {
        return view('tags.index')->with('tags',Tag::all());
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(CreateTagRequest $request)
    {
        Tag::create($request->all());
        session()->flash('success', 'Tag criada com sucesso!');
        return redirect(route('tags.index'));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit')->with('tag', $tag);
    }

    public function update(EditTagRequest $request, Tag $tag)
    {
        $tag->update([
            'nome' => $request->name
        ]);

        session()->flash('success', 'Tag alterada com sucesso!');
        return redirect(route('tags.index'));
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        
        $produto_count = $tag->produtos()->count();
        if($tag->produtos()->count() > 0){
            session()->flash('error', 'Não pode ser apagada pois temos ('.$produto_count.') produto(s) com essa tag');
            return redirect()->back();
        }
        $tag->delete();
        session()->flash('success', 'Tag movida para lixeira com sucesso!');
        return redirect()->back();
    }
}