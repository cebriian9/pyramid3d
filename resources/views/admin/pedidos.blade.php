@extends('layout.formato')

@section('tittle', 'AdminPedidos')

@section('contenido')

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Usuario</th>
            <th>Material</th>
            <th>Relleno</th>
            <th>Calidad</th>
            <th>Tamaño</th>
            <th>Nombre Archivo</th>
            <th>Path Archivo</th>
            <th>Hecho</th>
            <th>Fecha Creación</th>
            <th>Última Actualización</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pedidos as $pedido)
        <tr>
            <td>{{ $pedido->id }}</td>
            <td>{{ $pedido->id_user }}</td>
            <td>{{ $pedido->material }}</td>
            <td>{{ $pedido->relleno }}</td>
            <td>{{ $pedido->calidad }}</td>
            <td>{{ $pedido->tamano }}</td>
            <td>{{ $pedido->nombreArchivo }}</td>
            <td>{{ $pedido->pathArchivo }}</td>
            <td>{{ $pedido->hecho }}</td>
            <td>{{ $pedido->created_at }}</td>
            <td>{{ $pedido->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection