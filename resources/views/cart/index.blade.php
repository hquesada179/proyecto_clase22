@extends('layouts.app')
@section('content')

<style>
    .cart-flash {
        padding: 13px 18px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 20px;
        background: rgba(16,185,129,.08);
        border: 1px solid rgba(16,185,129,.25);
        color: #065f46;
    }

    /* ── Tabla del carrito ── */
    .cart-table-wrap {
        width: 100%;
        overflow-x: auto;
        border: 1px solid var(--border);
        border-radius: 14px;
    }
    .cart-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 560px;
    }
    .cart-table thead th {
        text-align: left;
        background: #f8fafc;
        color: var(--muted);
        font-size: 11px;
        letter-spacing: .6px;
        text-transform: uppercase;
        padding: 13px 16px;
        border-bottom: 1px solid var(--border);
    }
    .cart-table tbody td {
        padding: 14px 16px;
        border-bottom: 1px solid var(--border);
        font-size: 14px;
        vertical-align: middle;
    }
    .cart-table tbody tr:last-child td { border-bottom: none; }
    .cart-table tbody tr:hover { background: rgba(37,99,235,.025); }

    /* ── Imagen miniatura ── */
    .cart-thumb {
        width: 56px;
        height: 56px;
        border-radius: 10px;
        object-fit: cover;
        border: 1px solid var(--border);
        display: block;
        flex-shrink: 0;
    }
    .cart-thumb-empty {
        width: 56px;
        height: 56px;
        border-radius: 10px;
        border: 1px solid var(--border);
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #cbd5e1;
        font-size: 20px;
        flex-shrink: 0;
    }
    .cart-product-cell {
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .cart-product-name {
        font-weight: 700;
        color: var(--text);
        font-size: 14px;
        line-height: 1.3;
    }
    .cart-product-price {
        font-size: 13px;
        color: var(--muted);
        margin-top: 2px;
    }

    /* ── Cantidad pill ── */
    .qty-pill {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 5px 14px;
        font-size: 14px;
        font-weight: 700;
        color: var(--text);
        min-width: 44px;
    }

    /* ── Subtotal ── */
    .subtotal {
        font-weight: 800;
        font-size: 15px;
        color: var(--primary);
    }

    /* ── Totales ── */
    .cart-totals {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 24px;
        margin-top: 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
    }
    .cart-totals__label {
        font-size: 13px;
        color: var(--muted);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 4px;
    }
    .cart-totals__amount {
        font-size: 32px;
        font-weight: 900;
        color: var(--primary);
    }
    .cart-totals__actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        align-items: center;
    }

    /* ── Empty state ── */
    .cart-empty {
        text-align: center;
        padding: 72px 20px;
        color: var(--muted);
    }
    .cart-empty__icon {
        font-size: 56px;
        margin-bottom: 20px;
        opacity: .4;
    }
    .cart-empty h2 {
        font-size: 22px;
        font-weight: 800;
        color: var(--text);
        margin-bottom: 8px;
    }
    .cart-empty p {
        font-size: 15px;
        color: var(--muted);
        margin-bottom: 28px;
    }
</style>

<div class="container">
    <div class="card">

        <div class="card__header">
            <h1>Carrito de compras</h1>
            <a class="btn btn-light" href="{{ route('product.index') }}">← Seguir comprando</a>
        </div>

        <div class="card__body">

            {{-- Flash --}}
            @if(session('cart_success'))
                <div class="cart-flash">{{ session('cart_success') }}</div>
            @endif

            @if($items->isEmpty())
                {{-- Estado vacío --}}
                <div class="cart-empty">
                    <div class="cart-empty__icon">🛒</div>
                    <h2>Tu carrito está vacío</h2>
                    <p>Agrega productos desde el catálogo para verlos aquí.</p>
                    <a class="btn btn-primary" href="{{ route('product.index') }}">
                        Explorar catálogo
                    </a>
                </div>

            @else
                {{-- Tabla de items --}}
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio unitario</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                @if($item->product)
                                <tr>
                                    {{-- Producto --}}
                                    <td>
                                        <div class="cart-product-cell">
                                            @if($item->product->image)
                                                <img class="cart-thumb"
                                                     src="{{ asset('storage/' . $item->product->image) }}"
                                                     alt="{{ $item->product->name }}">
                                            @else
                                                <div class="cart-thumb-empty">📦</div>
                                            @endif
                                            <div>
                                                <div class="cart-product-name">
                                                    <a href="{{ route('product.show', $item->product->id) }}"
                                                       style="text-decoration:none; color:inherit;">
                                                        {{ $item->product->name }}
                                                    </a>
                                                </div>
                                                @if($item->product->category)
                                                    <div class="cart-product-price">
                                                        {{ $item->product->category->name }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Precio unitario --}}
                                    <td style="font-weight:600; color:var(--text);">
                                        $ {{ number_format($item->product->price, 0, ',', '.') }}
                                    </td>

                                    {{-- Cantidad --}}
                                    <td>
                                        <span class="qty-pill">{{ $item->quantity }}</span>
                                    </td>

                                    {{-- Subtotal --}}
                                    <td>
                                        <span class="subtotal">
                                            $ {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                        </span>
                                    </td>

                                    {{-- Eliminar --}}
                                    <td>
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    title="Eliminar del carrito">
                                                ✕
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Totales y acciones --}}
                <div class="cart-totals">
                    <div>
                        <div class="cart-totals__label">Total</div>
                        <div class="cart-totals__amount">
                            $ {{ number_format($total, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="cart-totals__actions">
                        <form action="{{ route('cart.clear') }}" method="POST"
                              onsubmit="return confirm('¿Vaciar todo el carrito?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-ghost">
                                🗑 Vaciar carrito
                            </button>
                        </form>
                        <a class="btn btn-primary" href="{{ route('product.index') }}">
                            ← Seguir comprando
                        </a>
                    </div>
                </div>

            @endif

        </div>
    </div>
</div>

@endsection
