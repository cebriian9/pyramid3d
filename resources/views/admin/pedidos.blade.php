@extends('layout.formato')

@section('tittle', 'AdminPedidos')

@section('contenido')

<table class="table tabl">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Usuario</th>
            <th>Material</th>
            <th>Relleno</th>
            <th>Calidad</th>
            <th>Tamaño</th>
            <th>Nombre Archivo</th>
            
            <th>Hecho</th>
            <th>Fecha Creación</th>
            <th>Última Actualización</th>
            <th>descargar</th>
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
            <td>
                @if ($pedido->hecho)
                    si
                @else
                    no
                @endif
            </td>
            <td></td>
            <td>{{ $pedido->created_at }}</td>
            <td>{{ $pedido->updated_at }}</td>
            <td><a href="{{ Storage::url($pedido->pathArchivo) }}">Descargar archivo</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="flex justify-center">
    {{ $pedidos->links('pagination::tailwind') }}
</div>
@endsection