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
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'imagen'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('imagenes', 'public');
        }

        Product::create([
            'name'        => $request->nombre,
            'description' => $request->descripcion,
            'price'       => $request->precio,
            'category_id' => $request->category_id,
            'image'       => $imagePath,
        ]);

        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', ['product' => $product]);
    }

    public function imageOnly($id)
    {
        $product = Product::findOrFail($id);

        if (!$product->image) {
            abort(404, 'Este producto no tiene imagen.');
        }

        return redirect(asset('storage/' . $product->image));
    }
}