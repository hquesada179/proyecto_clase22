<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product['nombre'] }}</title>

    <style>
        :root{
            --primary:#e45a3c;
            --bg:#f6f7fb;
            --card:#ffffff;
            --text:#1f2937;
            --muted:#6b7280;
            --border:#e5e7eb;
            --radius:18px;
        }

        *{ box-sizing:border-box; margin:0; padding:0; font-family: Arial, Helvetica, sans-serif; }

        body{
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            padding: 26px;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .card{
            width: min(980px, 100%);
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow:hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,.07);
            display:grid;
            grid-template-columns: 1.2fr 1fr;
        }

        .imgBox{
            background:#fff;
            padding: 22px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-right: 1px solid var(--border);
        }

        .imgBox img{
            width: 100%;
            max-width: 420px;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 16px;
            border: 1px solid var(--border);
        }

        .info{
            padding: 24px;
            display:flex;
            flex-direction:column;
            gap: 14px;
        }

        .title{
            font-size: 24px;
            font-weight: 900;
            letter-spacing:.4px;
        }

        .price{
            font-size: 22px;
            font-weight: 900;
            color: var(--primary);
        }

        .desc{
            color: var(--muted);
            line-height: 1.5;
        }

        .actions{
            margin-top: 8px;
            display:flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding: 12px 14px;
            border-radius: 14px;
            font-weight: 900;
            border: 1px solid var(--border);
            text-decoration:none;
            cursor:pointer;
            transition: .2s;
        }

        .btn-primary{
            background: var(--primary);
            border-color: transparent;
            color: #fff;
        }
        .btn-primary:hover{ transform: translateY(-1px); opacity:.95; }

        .btn-ghost{
            background:#fff;
            color: var(--text);
        }
        .btn-ghost:hover{ transform: translateY(-1px); }

        @media (max-width: 860px){
            .card{ grid-template-columns: 1fr; }
            .imgBox{ border-right: none; border-bottom: 1px solid var(--border); }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="imgBox">
            <img src="{{ asset($product['imagen']) }}" alt="Producto">
        </div>

        <div class="info">
            <div class="title">{{ $product['nombre'] }}</div>
            <div class="price">$ {{ number_format($product['precio'], 0, ',', '.') }}</div>
            <div class="desc">{{ $product['descripcion'] }}</div>

            <div class="actions">
                <a class="btn btn-primary" target="_blank" href="{{ route('product.image', $product['id_producto']) }}">
                    Comprar producto
                </a>

                <a class="btn btn-ghost" href="{{ route('product.index') }}">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>