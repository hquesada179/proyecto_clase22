<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->latest('id')->get();
        return view('category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:100|unique:categories,name',
            'description' => 'required|string|max:500',
        ]);

        Category::create([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('category.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'        => 'required|string|max:100|unique:categories,name,' . $category->id,
            'description' => 'required|string|max:500',
        ]);

        $category->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('category.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            return redirect()->route('category.index')
                ->with('error', "No se puede eliminar \"{$category->name}\" porque tiene {$category->products()->count()} producto(s) asociado(s).");
        }

        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}
