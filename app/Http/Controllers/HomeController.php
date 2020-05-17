<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{

    public function index()
    {
        return view('home')->with('products', Product::all()->sortByDesc('price')->take(4));
    }

    public function show(){
        return view('home')->with('products', Product::all()->sortByDesc('price')->take(4));
    }
}
