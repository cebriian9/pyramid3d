@extends('layout.formato')

@section('tittle', 'AdminPedidos')

@section('contenido')
    <style>
        .boton-giratorio {
            transition: transform 0.5s ease-in-out;
        }

        .boton-giratorio.girando {
            transform: rotate(360deg);
        }
    </style>

    <div class="flex justify-center items-center my-4">
        <span class="text-xl font-semibold">Pedidos</span>
    </div>

    <div class=" overflow-x-auto sm:rounded-lg mt-7 mb-4 ">
        <table class="w-full text-sm text-left ">
            <thead class=" uppercase bg-primario text-claro">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class=" px-6 py-3 ">
                        Usuario
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
                        Pedido
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actualización <button id="mi-boton" class="boton-giratorio ml-3"><i
                                class="fa-solid fa-rotate-right"></i></button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr class="bg-white border-b  hover:bg-gray-400 cursor-pointer enlace"
                        data-href="/admin/datosPedido/{{ $pedido->id }}">
                        <td class="px-6 py-4  ">
                            {{ $pedido->id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pedido->usuario }}
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
                            @csrf
                            <label class="relative inline-flex items-center cursor-pointer no-enlace">
                                <input type="checkbox" value="{{ $pedido->id }}" name="id"
                                    class="sr-only peer check-pedido no-enlace" onclick='updateHecho("{{ $pedido->id }}")'
                                    @if ($pedido->hecho) checked @endif>
                                <div
                                    class="no-enlace shadow-gray-900 shadow-sm w-11 h-6 bg-gray-400 peer-focus:outline-none rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-coral-50  after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-secundario-50">
                                </div>

                            </label>

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
    <!--token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <div class="flex justify-center mb-6">
        {{ $pedidos->links('pagination::tailwind') }}
    </div>

    <!--ajax-->
    <script>
        function updateHecho(id) {

            const xhr = new XMLHttpRequest();
            const form = new FormData();
            //optengo el token para enviarlo
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            //saco el id del pedido
            form.append('id', id);
            form.append('_token', token);
            xhr.open('POST', "{{ route('updatePedido') }}");
            xhr.send(form);
        }


        //refrecar datos
        const boton = document.getElementById("mi-boton");
        boton.addEventListener("click", function() {
            boton.classList.add("girando");

            setTimeout(function() {
                boton.classList.remove("girando");
            }, 500);

            location.reload();
        });

        // Seleccionar todas las filas que tienen la clase "enlace"
        var filasEnlace = document.querySelectorAll('.enlace');

        // Agregar un controlador de eventos de clic a cada fila
        filasEnlace.forEach(function(fila) {
            fila.addEventListener('click', function(evento) {
                // Comprobar si se ha hecho clic en el checkbox
                if (evento.target.classList.contains('no-enlace')) {
                    // Detener la propagación del evento de clic
                    evento.stopPropagation();
                } else {
                    // Obtener la URL almacenada en el atributo "data-href" de la fila
                    var url = this.getAttribute('data-href');
                    // Redirigir a la página correspondiente
                    window.location.href = url;
                }
            });
        });
    </script>


@endsection
