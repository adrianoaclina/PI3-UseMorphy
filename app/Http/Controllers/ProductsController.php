<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{  
    public function __construct(){
        $this->middleware('VerifyCategoriesCount')->only(['create','store']);
    }
    public function index(){
        return view('products.index')->with('products', Product::all());
    }

    public function create(){
        return view('products.create')->with('categories', Category::all());
    }

    public function store(CreateProductRequest $request){
        $image = $request->image->store('products');
        $product = Product::create($request->all());
        $product->image = $image;
        $product->save();
        session()->flash('success', "Produto cadastrado com sucesso!");
        return redirect(route('products.index'));
    }

    public function show(Product $product){
        return view('products.show')->with('product', $product)->with('categories', Category::all());
    }
    public function edit(Product $product){
        return view('products.edit')->with('product', $product)->with('categories', Category::all());

    }
    public function update(EditProductRequest $request, Product $product){

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'category_id' => $request->category_id
        ]);

        if($request->image){
            //apaga imagem anterior
            Storage::delete($product->image);

            //cria a imagem;
            $image = $request->image->store('products');

            //atualiza o endereço da imagem no banco
            $product->image = $image;
            $product->save();
        }
        session()->flash('success', "Produto alterado com sucesso!");
        return redirect(route('products.index'));

    }
    public function destroy(Product $product){
        $product->delete();
        session()->flash('success', 'Produto removido com sucesso!');
        return redirect(route('products.index'));
    }
}
