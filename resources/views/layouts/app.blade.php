<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Electronictech</title>

    <style>
        /* ── Variables ── */
        :root {
            --primary:      #2563eb;
            --primary-dark: #1d4ed8;
            --accent:       #06b6d4;
            --bg:           #f1f5f9;
            --card:         #ffffff;
            --dark:         #0f172a;
            --text:         #0f172a;
            --muted:        #64748b;
            --border:       #e2e8f0;
            --radius:       14px;
        }

        /* ── Reset ── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        /* ── Navbar ── */
        .navbar {
            background: var(--dark);
            height: 58px;
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }
        .navbar__brand {
            color: #fff;
            font-size: 20px;
            font-weight: 900;
            letter-spacing: .4px;
            text-decoration: none;
        }
        .navbar__brand span { color: var(--accent); }
        .navbar__nav { display: flex; gap: 8px; align-items: center; }
        .navbar__link {
            color: rgba(255,255,255,.65);
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 8px;
            transition: .15s;
        }
        .navbar__link:hover { color: #fff; background: rgba(255,255,255,.1); }

        /* ── Page container ── */
        .container {
            width: min(1200px, 100%);
            margin: 0 auto;
            padding: 28px 20px;
        }

        /* ── Card ── */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0,0,0,.06);
        }

        /* ── Card header (dark, used in index & create) ── */
        .header, .card__header {
            background: var(--dark);
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }
        .header h1, .card__header h1 {
            color: #fff;
            font-size: 20px;
            font-weight: 900;
            letter-spacing: .3px;
        }
        .card__header .badge {
            background: rgba(6,182,212,.18);
            border-color: rgba(6,182,212,.35);
            color: #a5f3fc;
        }

        /* ── Card body ── */
        .body, .card__body { padding: 24px; }

        /* ── Buttons ── */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            border: 1px solid transparent;
            cursor: pointer;
            text-decoration: none;
            transition: .18s;
            white-space: nowrap;
        }
        .btn-light {
            background: rgba(255,255,255,.12);
            color: #fff;
            border-color: rgba(255,255,255,.22);
        }
        .btn-light:hover { background: rgba(255,255,255,.22); transform: translateY(-1px); }

        .btn-primary {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
        }
        .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); }

        .btn-ghost {
            background: #fff;
            color: var(--text);
            border-color: var(--border);
        }
        .btn-ghost:hover { background: var(--bg); transform: translateY(-1px); }

        .btn-sm { padding: 7px 14px; font-size: 13px; border-radius: 8px; }

        /* ── Badge ── */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: rgba(37,99,235,.08);
            border: 1px solid rgba(37,99,235,.18);
            color: #1d4ed8;
        }

        /* ── Form elements ── */
        .input, .textarea, .select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--border);
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            background: #fff;
            color: var(--text);
            transition: border-color .18s, box-shadow .18s;
        }
        .input:focus, .textarea:focus, .select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37,99,235,.12);
        }
        .textarea { resize: vertical; min-height: 100px; font-family: inherit; }
        .select { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2364748b' d='M6 8L1 3h10z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 14px center; padding-right: 34px; }

        /* ── Form grid ── */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }
        @media (max-width: 600px) { .grid { grid-template-columns: 1fr; } }

        .row { display: flex; flex-direction: column; gap: 5px; }
        .row label {
            font-size: 12px;
            font-weight: 700;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .5px;
        }
        .hint { font-size: 12px; color: var(--muted); margin-top: 2px; }

        .actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .error-box {
            background: rgba(239,68,68,.07);
            border: 1px solid rgba(239,68,68,.22);
            border-radius: 10px;
            padding: 14px 16px;
            margin-bottom: 20px;
            color: #b91c1c;
            font-size: 14px;
        }
        .error-box ul { padding-left: 18px; margin-top: 6px; }

        /* ── Topbar ── */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }
        .note { font-size: 13px; color: var(--muted); }
        .search .input { min-width: 220px; }

        /* ── Product card grid ── */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform .2s, box-shadow .2s;
        }
        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 30px rgba(0,0,0,.10);
        }

        .product-card__img-wrap {
            aspect-ratio: 4 / 3;
            overflow: hidden;
            background: #f8fafc;
        }
        .product-card__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .3s;
        }
        .product-card:hover .product-card__img { transform: scale(1.04); }

        .product-card__body {
            padding: 14px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .product-card__name {
            font-size: 15px;
            font-weight: 700;
            color: var(--text);
            line-height: 1.3;
        }
        .product-card__price {
            font-size: 20px;
            font-weight: 900;
            color: var(--primary);
        }
        .product-card__desc {
            font-size: 13px;
            color: var(--muted);
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            flex: 1;
            line-height: 1.5;
        }

        .product-card__footer {
            padding: 10px 14px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
        }

        .products-empty {
            text-align: center;
            padding: 64px 20px;
            color: var(--muted);
        }
        .products-empty p { font-size: 16px; margin-bottom: 20px; }

        /* ── Table (compatibilidad) ── */
        .table-wrap { width: 100%; overflow-x: auto; border: 1px solid var(--border); border-radius: 12px; }
        table { width: 100%; border-collapse: collapse; min-width: 600px; }
        thead th { text-align: left; background: #f8fafc; color: var(--muted); font-size: 11px; letter-spacing: .6px; text-transform: uppercase; padding: 12px 14px; border-bottom: 1px solid var(--border); }
        tbody td { padding: 13px 14px; border-bottom: 1px solid var(--border); font-size: 14px; vertical-align: middle; }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: rgba(37,99,235,.04); }
        .thumb { width: 44px; height: 44px; border-radius: 8px; object-fit: cover; border: 1px solid var(--border); display: block; }
        .empty { text-align: center; padding: 32px 10px; color: var(--muted); font-size: 14px; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a class="navbar__brand" href="{{ url('/') }}">
            Electronic<span>tech</span>
        </a>
        <div class="navbar__nav">
            <a class="navbar__link" href="{{ route('product.index') }}">Productos</a>
            <a class="navbar__link" href="{{ route('product.create') }}">+ Nuevo</a>
        </div>
    </nav>

    @yield('content')

</body>
</html>
