<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // ✅ listado
    public function index()
    {
        return view('Product.index');
    }

    // ✅ formulario
    public function create()
    {
        return view('Product.create');
    }

    // ✅ guardar (por ahora solo ejemplo)
    public function store(Request $request)
    {
        // Aún no hay BD, entonces solo redirigimos al listado.
        return redirect()->route('product.index');
    }

    // ✅ show: PANEL de producto (detalle)
    public function show($id, $categoria = null)
    {
        $products = [
            1 => [
                'id_producto' => 1,
                'nombre' => 'Camisa Oversize',
                'precio' => 65000,
                'descripcion' => 'Camisa algodón, talla única.',
                'imagen' => 'images/Products/oversize.jpg',
                'estado' => 1
            ],
            2 => [
                'id_producto' => 2,
                'nombre' => 'Pantalón Cargo',
                'precio' => 120000,
                'descripcion' => 'Pantalón con bolsillos laterales.',
                'imagen' => 'images/Products/cargo.jpg',
                'estado' => 0
            ],
            3 => [
                'id_producto' => 3,
                'nombre' => 'Tenis Deportivos',
                'precio' => 180000,
                'descripcion' => 'Tenis casual, suela cómoda.',
                'imagen' => 'images/Products/tennis.png',
                'estado' => 1
            ],
            4 => [
                'id_producto' => 4,
                'nombre' => 'Gorra Negra',
                'precio' => 45000,
                'descripcion' => 'Gorra ajustable, estilo urbano.',
                'imagen' => 'images/Products/gorra.jpg',
                'estado' => 1
            ],
            5 => [
                'id_producto' => 5,
                'nombre' => 'Chaqueta Denim',
                'precio' => 210000,
                'descripcion' => 'Chaqueta jean, look clásico.',
                'imagen' => 'images/Products/chaqueta.jpg',
                'estado' => 0
            ],
            6 => [
                'id_producto' => 6,
                'nombre' => 'Vestido Floral',
                'precio' => 135000,
                'descripcion' => 'Vestido ligero, estampado floral.',
                'imagen' => 'images/Products/Vestido.jpg',
                'estado' => 1
            ],
        ];

        $product = $products[(int)$id] ?? null;

        if (!$product) {
            abort(404);
        }

        return view('Product.show', compact('product'));
    }

    // ✅ imageOnly: SOLO LA IMAGEN (modo comprar)
    public function imageOnly($id)
    {
        $products = [
            1 => ['imagen' => 'images/Products/oversize.jpg'],
            2 => ['imagen' => 'images/Products/cargo.jpg'],
            3 => ['imagen' => 'images/Products/tennis.png'],
            4 => ['imagen' => 'images/Products/gorra.jpg'],
            5 => ['imagen' => 'images/Products/chaqueta.jpg'],
            6 => ['imagen' => 'images/Products/Vestido.jpg'],
        ];

        $product = $products[(int)$id] ?? null;

        if (!$product) {
            abort(404);
        }

        return view('Product.image', compact('product'));
    }
}