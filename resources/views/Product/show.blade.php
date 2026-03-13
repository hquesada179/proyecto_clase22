@extends('layouts.app')
@section('content')
<div class="container">

    <div class="show-card">

        {{-- Panel izquierdo: imagen --}}
        <div class="show-img-panel">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
                <div style="
                    width: 100%;
                    max-width: 400px;
                    aspect-ratio: 1 / 1;
                    border-radius: 14px;
                    border: 1px solid var(--border);
                    background: #f1f5f9;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    gap: 12px;
                    color: #94a3b8;
                ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                        <rect x="3" y="3" width="18" height="18" rx="3" stroke="currentColor" fill="none"/>
                        <circle cx="8.5" cy="8.5" r="1.5" fill="currentColor" stroke="none"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 15l-5-5L5 21"/>
                    </svg>
                    <span style="font-size:13px; font-weight:600; letter-spacing:.3px;">Sin imagen</span>
                </div>
            @endif
        </div>

        {{-- Panel derecho: información --}}
        <div class="show-info-panel">

            @if($product->category)
                <div class="show-category-badge">{{ $product->category->name }}</div>
            @endif

            <h1 class="show-title">{{ $product->name }}</h1>

            <div class="show-price">$ {{ number_format($product->price, 0, ',', '.') }}</div>

            <div class="show-divider"></div>

            <div>
                <div class="show-label">Descripción</div>
                <p class="show-desc">{{ $product->description ?? 'Sin descripción disponible.' }}</p>
            </div>

            @if(session('cart_success'))
                <div style="padding:10px 14px; border-radius:9px; font-size:13px; font-weight:600;
                            background:rgba(6,182,212,.12); border:1px solid rgba(6,182,212,.3); color:var(--accent);">
                    🛒 {{ session('cart_success') }}
                </div>
            @endif

            <div class="show-actions">
                {{-- Agregar al carrito --}}
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-accent" style="font-weight:800;">
                        🛒 Agregar al carrito
                    </button>
                </form>

                @if($product->image)
                    <a class="btn btn-outline"
                       href="{{ route('product.image', $product->id) }}"
                       target="_blank">
                        Ver imagen →
                    </a>
                @endif

                <a class="btn btn-outline" href="{{ route('product.index') }}">
                    ← Volver al catálogo
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
