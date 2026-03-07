<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $miLista = Product::all();
        return view('product.index', ['miLista' => $miLista]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        // Implementado en Paso 3
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', ['product' => $product]);
    }

    public function imageOnly($id)
    {
        // Implementado en Paso 6
    }
}