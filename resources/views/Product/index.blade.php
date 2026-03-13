@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="header">
            <h1>Catálogo de Productos</h1>
            <a class="btn btn-light" href="{{ route('product.create') }}">+ Nuevo producto</a>
        </div>
        

        <div class="body">

            @if(session('cart_success'))
                <div style="margin:0 0 18px; padding:12px 16px; border-radius:10px; font-size:14px; font-weight:600;
                            background:rgba(16,185,129,.08); border:1px solid rgba(16,185,129,.25); color:#065f46;">
                    🛒 {{ session('cart_success') }}
                </div>
            @endif

            <div class="topbar">
                <div class="note">{{ $miLista->total() }} producto(s) registrado(s)</div>
                <div class="search">
                    <input class="input" type="text" placeholder="Buscar (próximamente)..." disabled>
                </div>
            </div>

            @if($miLista->isEmpty())
                <div class="products-empty">
                    <p>No hay productos para mostrar.</p>
                    <a class="btn btn-primary" href="{{ route('product.create') }}">+ Agregar primer producto</a>
                </div>
            @else
                <div class="products-grid">
                    @foreach($miLista as $p)
                        @php
                            $imgSrc = $p->image
                                ? asset('storage/' . $p->image)
                                : 'https://placehold.co/300x225?text=Sin+imagen';
                        @endphp

                        <div class="product-card">
                            <div class="product-card__img-wrap">
                                <img class="product-card__img" src="{{ $imgSrc }}" alt="{{ $p->name }}">
                            </div>

                            <div class="product-card__body">
                                <div class="product-card__name">{{ $p->name }}</div>
                                <div class="product-card__price">$ {{ number_format($p->price, 0, ',', '.') }}</div>
                                <div class="product-card__desc">{{ $p->description }}</div>

                                {{-- Agregar al carrito --}}
                                <form action="{{ route('cart.add', $p->id) }}" method="POST" style="margin-top:auto; padding-top:10px;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm" style="width:100%;">
                                        🛒 Agregar al carrito
                                    </button>
                                </form>
                            </div>

                            <div class="product-card__footer">
                                <span class="badge">{{ $p->category->name ?? '-' }}</span>
                                <div class="card-actions">
                                    <a class="btn btn-sm btn-ghost" href="{{ route('product.show', $p->id) }}">Ver detalle →</a>
                                    <form action="{{ route('product.destroy', $p->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pagination-wrap">
                    {{ $miLista->onEachSide(1)->links('pagination::bootstrap-4') }}
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
