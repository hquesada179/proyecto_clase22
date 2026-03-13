@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">

        <div class="card__header">
            <h1>Editar categoría</h1>
            <a class="btn btn-light" href="{{ route('category.index') }}">← Volver</a>
        </div>

        <div class="card__body">

            @if($errors->any())
                <div class="error-box">
                    <strong>Corrige los siguientes errores:</strong>
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid" style="grid-template-columns: 1fr;">

                    <div class="row">
                        <label for="name">Nombre de la categoría</label>
                        <input id="name"
                               name="name"
                               type="text"
                               class="input"
                               value="{{ old('name', $category->name) }}"
                               placeholder="Ej: Smartphones"
                               maxlength="100"
                               required>
                        @error('name')
                            <span class="hint" style="color:#dc2626;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="description">Descripción</label>
                        <textarea id="description"
                                  name="description"
                                  class="textarea"
                                  placeholder="Describe brevemente esta categoría..."
                                  maxlength="500"
                                  required>{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <span class="hint" style="color:#dc2626;">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                {{-- Info: productos asociados --}}
                @php $count = $category->products()->count(); @endphp
                @if($count > 0)
                    <div style="
                        margin-top: 20px;
                        padding: 12px 16px;
                        background: rgba(37,99,235,.06);
                        border: 1px solid rgba(37,99,235,.18);
                        border-radius: 10px;
                        font-size: 13px;
                        color: var(--muted);
                    ">
                        Esta categoría tiene <strong style="color:var(--primary);">{{ $count }} producto(s)</strong> asociado(s).
                        Solo puedes editar el nombre y la descripción.
                    </div>
                @endif

                <div class="actions">
                    <a class="btn btn-ghost" href="{{ route('category.index') }}">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
