@extends('layouts.app')
@section('content')
<div class="container">

    <div class="show-card">

        {{-- Panel izquierdo: imagen --}}
        <div class="show-img-panel">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
                <img src="https://placehold.co/400x400?text=Sin+imagen" alt="Sin imagen">
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

            <div class="show-actions">
                @if($product->image)
                    <a class="btn btn-accent"
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
