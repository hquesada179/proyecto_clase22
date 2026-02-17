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
@yield ('content')

</html>