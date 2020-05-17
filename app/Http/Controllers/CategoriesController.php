<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Category;

class CategoriesController extends Controller
{
    public function index(){
        return view('categories.index')->with('categories', Category::all());
    }
    public function create(){
        return view('categories.create');
    }
    public function store(CreateCategoryRequest $request){
        Category::create($request->all());
        session()->flash('success', "Categoria cadastrada com sucesso!");
        return redirect(route('categories.index'));
    }
    public function show($id){
    }
    public function edit(Category $category){
        return view('categories.edit')->with('category', $category);
    }
    public function update(EditCategoryRequest $request, Category $category){
        $category->update([
            'name' => $request->name
        ]);
        session()->flash('success', "Categoria alterada com sucesso!");
        return redirect(route('categories.index'));
    }
    public function destroy(Category $category){
        $category->delete();
        session()->flash('success', 'Categoria removida com sucesso!');
        return redirect(route('categories.index'));
    }
}