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
@endsection