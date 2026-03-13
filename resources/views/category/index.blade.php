@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">

        {{-- Cabecera --}}
        <div class="card__header">
            <h1>Categorías</h1>
            <a class="btn btn-light" href="{{ route('category.create') }}">+ Nueva categoría</a>
        </div>

        <div class="card__body">

            {{-- Mensajes flash --}}
            @if(session('success'))
                <div class="alert alert--success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert--error">{{ session('error') }}</div>
            @endif

            <div class="topbar">
                <div class="note">{{ $categories->count() }} categoría(s) registrada(s)</div>
                <a class="btn btn-sm btn-ghost" href="{{ route('product.index') }}">← Volver a productos</a>
            </div>

            @if($categories->isEmpty())
                <div class="products-empty">
                    <p>No hay categorías todavía.</p>
                    <a class="btn btn-primary" href="{{ route('category.create') }}">+ Crear primera categoría</a>
                </div>
            @else
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Productos</th>
                                <th>Creada</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $cat)
                                <tr>
                                    <td style="color:var(--muted); font-size:13px;">{{ $cat->id }}</td>
                                    <td>
                                        <span style="font-weight:700; color:var(--text);">{{ $cat->name }}</span>
                                    </td>
                                    <td style="color:var(--muted); max-width:320px;">
                                        {{ Str::limit($cat->description, 70) }}
                                    </td>
                                    <td>
                                        <span class="badge">{{ $cat->products_count }}</span>
                                    </td>
                                    <td style="color:var(--muted); font-size:13px; white-space:nowrap;">
                                        {{ $cat->created_at->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        <div class="card-actions">
                                            <a class="btn btn-sm btn-ghost"
                                               href="{{ route('category.edit', $cat->id) }}">
                                                Editar
                                            </a>
                                            <form action="{{ route('category.destroy', $cat->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('¿Eliminar la categoría «{{ $cat->name }}»?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</div>

<style>
    .alert {
        padding: 12px 16px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 18px;
    }
    .alert--success {
        background: rgba(16,185,129,.08);
        border: 1px solid rgba(16,185,129,.25);
        color: #065f46;
    }
    .alert--error {
        background: rgba(239,68,68,.07);
        border: 1px solid rgba(239,68,68,.22);
        color: #b91c1c;
    }
</style>

@endsection
