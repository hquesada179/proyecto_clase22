<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $items = CartItem::with('product')->get();

        $total = $items->sum(function ($item) {
            return $item->product ? $item->product->price * $item->quantity : 0;
        });

        return view('cart.index', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    public function add(Product $product)
    {
        $item = CartItem::where('product_id', $product->id)->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            CartItem::create([
                'product_id' => $product->id,
                'quantity'   => 1,
            ]);
        }

        return back()->with('cart_success', "«{$product->name}» agregado al carrito.");
    }

    public function remove(CartItem $cartItem)
    {
        $name = $cartItem->product->name ?? 'Producto';
        $cartItem->delete();

        return back()->with('cart_success', "«{$name}» eliminado del carrito.");
    }

    public function clear()
    {
        CartItem::truncate();

        return back()->with('cart_success', 'Carrito vaciado correctamente.');
    }
}
