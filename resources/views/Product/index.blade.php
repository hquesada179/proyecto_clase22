<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listado de Productos</title>

    <style>
        :root{
            --primary:#e45a3c;
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
            padding: 24px;
        }

        .container{
            width: min(1100px, 100%);
            margin: 0 auto;
        }

        .card{
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow:hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,.06);
        }

        .header{
            background: var(--primary);
            padding: 18px 22px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .header h1{
            color: #fff;
            font-size: 22px;
            letter-spacing: .5px;
        }

        .btn{
            border: none;
            cursor:pointer;
            padding: 10px 14px;
            border-radius: 12px;
            font-weight: 800;
            font-size: 14px;
            transition: .2s;
            text-decoration: none;
            display:inline-block;
        }

        .btn-light{
            background: rgba(255,255,255,.18);
            color:#fff;
            border: 1px solid rgba(255,255,255,.30);
        }
        .btn-light:hover{
            background: rgba(255,255,255,.26);
            transform: translateY(-1px);
        }

        .body{
            padding: 18px 22px 22px;
        }

        .table-wrap{
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            min-width: 760px;
        }

        thead th{
            text-align:left;
            background:#fff;
            color: var(--muted);
            font-size: 12px;
            letter-spacing: .6px;
            text-transform: uppercase;
            padding: 14px 12px;
            border-bottom: 1px solid var(--border);
        }

        tbody td{
            padding: 14px 12px;
            border-bottom: 1px solid var(--border);
            font-size: 14px;
            vertical-align: middle;
        }

        tbody tr:hover{
            background: rgba(228,90,60,.06);
        }

        .badge{
            display:inline-flex;
            align-items:center;
            gap:8px;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            border: 1px solid var(--border);
        }

        .badge--on{
            background: rgba(16,185,129,.10);
            border-color: rgba(16,185,129,.25);
            color: #065f46;
        }
        .badge--off{
            background: rgba(239,68,68,.10);
            border-color: rgba(239,68,68,.25);
            color: #7f1d1d;
        }

        .thumb{
            width: 44px;
            height: 44px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid var(--border);
            background:#fff;
            display:block;
        }

        .empty{
            text-align:center;
            padding: 26px 10px;
            color: var(--muted);
        }

        .topbar{
            display:flex;
            justify-content: space-between;
            align-items:center;
            gap: 12px;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }

        .search{
            display:flex;
            align-items:center;
            gap: 10px;
        }
        .input{
            padding: 10px 12px;
            border: 1px solid var(--border);
            border-radius: 12px;
            outline:none;
            min-width: 260px;
        }
        .input:focus{
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(228,90,60,.15);
        }

        .note{
            font-size: 12px;
            color: var(--muted);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="header">
            <h1>PRODUCTOS</h1>
            <a class="btn btn-light" href="{{ url('/product/create') }}">+ Nuevo producto</a>
        </div>

        <div class="body">

            <div class="topbar">
                <div class="note">Listado visual (por ahora usando datos de ejemplo).</div>
                <div class="search">
                    <input class="input" type="text" placeholder="Buscar (solo visual por ahora)..." disabled>
                </div>
            </div>

            @php
                // ✅ Productos de ejemplo con imágenes LOCALES (public/Images/Products)
                $products = [
                    [
                        'id_producto' => 1,
                        'nombre' => 'Camisa Oversize',
                        'precio' => 65000,
                        'descripcion' => 'Camisa algodón, talla única.',
                        'imagen' => 'Images/Products/oversize.jpg',
                        'estado' => 1
                    ],
                    [
                        'id_producto' => 2,
                        'nombre' => 'Pantalón Cargo',
                        'precio' => 120000,
                        'descripcion' => 'Pantalón con bolsillos laterales.',
                        'imagen' => 'Images/Products/cargo.jpg',
                        'estado' => 0
                    ],
                    [
                        'id_producto' => 3,
                        'nombre' => 'Tenis Deportivos',
                        'precio' => 180000,
                        'descripcion' => 'Tenis casual, suela cómoda.',
                        'imagen' => 'Images/Products/tennis.png',
                        'estado' => 1
                    ],
                    [
                        'id_producto' => 4,
                        'nombre' => 'Gorra Negra',
                        'precio' => 45000,
                        'descripcion' => 'Gorra ajustable, estilo urbano.',
                        'imagen' => 'Images/Products/gorra.jpg',
                        'estado' => 1
                    ],
                    [
                        'id_producto' => 5,
                        'nombre' => 'Chaqueta Denim',
                        'precio' => 210000,
                        'descripcion' => 'Chaqueta jean, look clásico.',
                        'imagen' => 'Images/Products/chaqueta.jpg',
                        'estado' => 0
                    ],
                    [
                        'id_producto' => 6,
                        'nombre' => 'Vestido Floral',
                        'precio' => 135000,
                        'descripcion' => 'Vestido ligero, estampado floral.',
                        'imagen' => 'Images/Products/Vestido.jpg',
                        'estado' => 1
                    ],
                ];
            @endphp

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>
                    @if(count($products) === 0)
                        <tr>
                            <td class="empty" colspan="6">No hay productos para mostrar.</td>
                        </tr>
                    @else
                        @foreach($products as $p)
                            @php
                                $img = $p['imagen'] ?? null;
                                $imgSrc = $img ? asset($img) : 'https://via.placeholder.com/44?text=IMG';
                                $estado = $p['estado'] ?? 0;
                                $precio = $p['precio'] ?? 0;
                            @endphp

                            <tr>
                                <td>{{ $p['id_producto'] ?? '-' }}</td>

                                <td>
                                    <img class="thumb" src="{{ $imgSrc }}" alt="img">
                                </td>

                                <td><strong>{{ $p['nombre'] ?? '' }}</strong></td>

                                <td>$ {{ number_format($precio, 0, ',', '.') }}</td>

                                <td>{{ $p['descripcion'] ?? '' }}</td>

                                <td>
                                    @if((string)$estado === "1")
                                        <span class="badge badge--on">● Activo</span>
                                    @else
                                        <span class="badge badge--off">● Inactivo</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</body>
</html>