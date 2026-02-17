@extends('layouts.app')
@section('content')
<body>
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

                {{-- Cambia route('product.store') por tu ruta real --}}
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
                            <label for="estado">Estado</label>
                            <select class="select" id="estado" name="estado" required>
                                <option value="" disabled {{ old('estado') ? '' : 'selected' }}>Selecciona...</option>
                                <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="actions">
                        {{-- Cambia route('product.index') por tu ruta real --}}
                        <a class="btn btn-ghost" href="{{ route('product.index') }}">Cancelar</a>
                        <button class="btn btn-primary" type="submit">Guardar producto</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
@endsection
