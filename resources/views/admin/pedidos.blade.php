@extends('layout.formato')

@section('tittle', 'AdminPedidos')

@section('contenido')

<div class="flex justify-center items-center my-4">
    <span class="text-xl font-semibold">Pedidos</span>
</div>

<div class=" overflow-x-auto sm:rounded-lg mt-7 mb-4">
    <table class="w-full text-sm text-left">
        <thead class=" uppercase bg-primario text-claro">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    ID_Usuario
                </th>
                <th scope="col" class="px-6 py-3">
                    Material
                </th>
                <th scope="col" class="px-6 py-3">
                    Relleno
                </th>
                <th scope="col" class="px-6 py-3">
                    Calidad
                </th>
                <th scope="col" class="px-6 py-3">
                    Tamaño
                </th>
                <th scope="col" class="px-6 py-3">
                    Archivo
                </th>
                <th scope="col" class="px-6 py-3">
                    Descargar
                </th>
                <th scope="col" class="px-6 py-3">
                    Hecho
                </th>
                <th scope="col" class="px-6 py-3">
                    Creacion
                </th>
                <th scope="col" class="px-6 py-3">
                    Actualización
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
            <tr class="bg-white border-b  hover:bg-gray-400">
                <th scope="row" class="px-6 py-4 font-bold text-primario whitespace-nowrap ">
                    {{ $pedido->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $pedido->id_user;}}
                    
                </td>
                <td class="px-6 py-4">
                    {{ $pedido->material }}
                </td>
                <td class="px-6 py-4">
                    {{ $pedido->relleno }}%
                </td>
                <td class="px-6 py-4">
                    {{ $pedido->calidad }}mm
                </td>
                <td class="px-6 py-4">
                    {{ $pedido->tamano }}mm
                </td>
                <td class="px-6 py-4">
                    {{ $pedido->nombreArchivo }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ Storage::url($pedido->pathArchivo) }}"
                        class="font-medium text-blue-500 hover:underline">Descargar archivo</a>
                </td>
                <td class="px-6 py-4">
                    @if ($pedido->hecho)
                    Si
                    @else
                    No
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{ $pedido->created_at }}
                </td>
                <td class="px-6 py-4">
                    {{ $pedido->updated_at }}
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



<div class="flex justify-center mb-6">
    {{ $pedidos->links('pagination::tailwind') }}
</div>
@endsection