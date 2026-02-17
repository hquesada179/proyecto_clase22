<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>

    <style>
        :root{
            --primary:#e45a3c;         /* naranja/rojo */
            --primary-dark:#c94b32;
            --bg:#f6f7fb;
            --card:#ffffff;
            --text:#1f2937;
            --muted:#6b7280;
            --border:#e5e7eb;
            --radius:16px;
        }

        *{ box-sizing:border-box; margin:0; padding:0; font-family: Arial, Helvetica, sans-serif; }

        body{
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding: 24px;
        }

        .container{
            width: min(980px, 100%);
        }

        .card{
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow:hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,.06);
        }

        .card__header{
            background: var(--primary);
            padding: 18px 22px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap: 12px;
        }

        .card__header h1{
            color: #fff;
            font-size: 22px;
            letter-spacing: .5px;
        }

        .badge{
            background: rgba(255,255,255,.18);
            color:#fff;
            border: 1px solid rgba(255,255,255,.30);
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
        }

        .card__body{
            padding: 22px;
        }

        .grid{
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        @media (max-width: 720px){
            .grid{ grid-template-columns: 1fr; }
        }

        label{
            display:block;
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 8px;
            font-weight: 700;
        }

        .input, .textarea, .select{
            width: 100%;
            padding: 12px 12px;
            border: 1px solid var(--border);
            border-radius: 12px;
            outline: none;
            font-size: 14px;
            background:#fff;
            transition: .2s;
        }

        .textarea{
            min-height: 110px;
            resize: vertical;
        }

        .input:focus, .textarea:focus, .select:focus{
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(228,90,60,.15);
        }

        .hint{
            margin-top: 6px;
            font-size: 12px;
            color: var(--muted);
        }

        .actions{
            display:flex;
            gap: 10px;
            justify-content:flex-end;
            margin-top: 18px;
            flex-wrap: wrap;
        }

        .btn{
            border: none;
            cursor:pointer;
            padding: 12px 16px;
            border-radius: 12px;
            font-weight: 800;
            font-size: 14px;
            transition: .2s;
        }

        .btn-primary{
            background: var(--primary);
            color:#fff;
        }
        .btn-primary:hover{
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-ghost{
            background: transparent;
            color: var(--primary);
            border: 1px solid rgba(228,90,60,.35);
        }
        .btn-ghost:hover{
            background: rgba(228,90,60,.08);
        }

        .error-box{
            background:#fff5f5;
            border:1px solid #fecaca;
            color:#7f1d1d;
            padding: 12px 14px;
            border-radius: 12px;
            margin-bottom: 14px;
            font-size: 14px;
        }
        .error-box ul{ margin-left: 18px; margin-top: 6px; }

        .row{
            display:flex;
            flex-direction:column;
        }
    </style>
</head>
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
</html>