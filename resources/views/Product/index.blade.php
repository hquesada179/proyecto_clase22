@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="header">
            <h1>PRODUCTOS</h1>
            <a class="btn btn-light" href="{{ url('/product/create') }}">+ Nuevo producto</a>
        </div>

        <div class="body">

            <div class="topbar">
                <div class="note">Listado de productos registrados en la base de datos.</div>
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
                            <th>Categoría</th>
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
                                $imgSrc = $p->image
                                    ? asset('storage/' . $p->image)
                                    : 'https://via.placeholder.com/44?text=IMG';
                            @endphp

                            <tr>
                                <td>{{ $p->id }}</td>

                                <td>
                                    <img class="thumb" src="{{ $imgSrc }}" alt="img">
                                </td>

                                <td><strong>{{ $p->name }}</strong></td>

                                <td>$ {{ number_format($p->price, 0, ',', '.') }}</td>

                                <td>{{ $p->description }}</td>

                                <td>
                                    <span class="badge">{{ $p->category->name ?? '-' }}</span>
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
@endsection