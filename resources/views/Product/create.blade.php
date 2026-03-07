@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card__header">
                <h1>PRODUCTO</h1>
                <span class="badge">Formulario de creación</span>
            </div>

            <div class="card__body">

                {{-- Errores de validación (si usas Request validation) --}}
                @if ($errors->any())
                    <div class="error-box">
                        <strong>Revisa estos errores:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid">
                        <div class="row">
                            <label for="nombre">Nombre</label>
                            <input class="input" type="text" id="nombre" name="nombre"
                                   value="{{ old('nombre') }}" placeholder="Ej: Camisa Oversize" required>
                        </div>

                        <div class="row">
                            <label for="precio">Precio</label>
                            <input class="input" type="number" id="precio" name="precio"
                                   value="{{ old('precio') }}" placeholder="Ej: 65000" min="0" step="0.01" required>
                            <div class="hint">Puedes usar decimales (step=0.01).</div>
                        </div>

                        <div class="row" style="grid-column: 1 / -1;">
                            <label for="descripcion">Descripción</label>
                            <textarea class="textarea" id="descripcion" name="descripcion"
                                      placeholder="Describe el producto...">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="row">
                            <label for="imagen">Imagen</label>
                            <input class="input" type="file" id="imagen" name="imagen" accept="image/*">
                            <div class="hint">Formatos recomendados: JPG/PNG.</div>
                        </div>

                        <div class="row">
                            <label for="category_id">Categoría</label>
                            <select class="select" id="category_id" name="category_id" required>
                                <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Selecciona...</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="actions">
                        <a class="btn btn-ghost" href="{{ route('product.index') }}">Cancelar</a>
                        <button class="btn btn-primary" type="submit">Guardar producto</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
