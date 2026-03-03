@extends('layouts.app')
@section('content')
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
                    @if(count($miLista) === 0)
                        <tr>
                            <td class="empty" colspan="6">No hay productos para mostrar.</td>
                        </tr>
                    @else
                        @foreach($miLista as $p)
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
@endsection