@extends('layout.formato')

@section('tittle', 'impresion')

@section('contenido')

    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>

    <div class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 md:p-10 pb-14 mt-10 mb-24">


        <span class="flex justify-center items-center text-2xl font-semibold gap-2 mb-3">
            <i class="fa-solid fa-user mt-10 md:mt-0"></i>Perfil
        </span>

        <div class="grid grid-cols-1 xl:grid-cols-3">


            <!--datos y direcciones-->
            <div class="flex flex-col gap-6 px-2">

                <div
                    class="flex flex-col gap-1 bg-primario text-coral-50 p-3 border-solid border-2 border-coral-50 rounded-lg">
                    <span class="font-medium text-xl">Datos:</span>
                    <nav><span class="font-semibold">Usuario:</span> <span>{{ Auth::user()->usuario }}</span></nav>
                    <nav><span class="font-semibold">Correo:</span> <span>{{ Auth::user()->email }}</span></nav>

                    <nav><span class="font-semibold">Nombre:</span> <span
                            id="MostrarNombre">{{ Auth::user()->nombre }}</span>
                    </nav>
                    <nav><span class="font-semibold">Apellidos:</span> <span
                            id="MostrarApellido">{{ Auth::user()->apellido }}</span>
                    </nav>
                    <nav><span class="font-semibold">Direccion:</span> <span
                            id="direccion">{{ Auth::user()->direccion }}</span>
                    </nav>
                </div>


                <div class="flex flex-col gap-3">
                    <nav>
                        <span id="direccion">
                            @if (Auth::user()->direccion == null)
                                <div id="notificacion"
                                    class="notificacion bg-primario text-coral-50 p-3 border border-coral-50 rounded-lg ">
                                    <nav class="flex justify-between">
                                        <h4 class="font-semibold">Completa tu perfil</h4>
                                    </nav>
                                    <p>Tus datos de envio estan vacios. Por favor, actualízalos aqui abajo.</p>
                                </div>
                            @endif
                        </span>
                    </nav>
                    <div class="flex justify-center xl:justify-start">
                        <div id="accordion-collapse" data-accordion="collapse" class="">
                            <h2 id="accordion-collapse-heading-1">
                                <button type="button"
                                    class="flex items-center justify-between w-64 p-3   bg-secundario-50 hover:bg-secundario-100 rounded-t-xl "
                                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-1">
                                    <span class="text-claro">Añadir nueva dirección</span>
                                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0 text-claro"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-1" class="hidden w-full"
                                aria-labelledby="accordion-collapse-heading-1">
                                <div class="p-2 border border-secundario-50 rounded-b-xl">

                                    <!--formulario de direccion-->
                                    <div class="flex flex-col items-center">
                                        <h3 class=" mb-3">Añadir nueva dirección:</h3>
                                        <nav class="grid grid-cols-1 sm:grid-cols-2 gap-1 w-full">

                                            <input type="text" id="nombre" name="nombre" placeholder="Nombre"
                                                class=" border border-gray-300 rounded-lg px-2.5 h-8">


                                            <input type="text" id="apellido" name="apellido" placeholder="Apellidos"
                                                class=" border border-gray-300 rounded-lg px-2.5 h-8">


                                            <input type="text" id="calle" name="calle" placeholder="Dirección"
                                                class=" border border-gray-300 rounded-lg px-2.5 h-8"
                                                autocomplete="street-address">



                                            <input type="text" id="provincia" name="provincia" placeholder="Provincia"
                                                class=" border border-gray-300 rounded-lg px-2.5 h-8"
                                                autocomplete="address-level1">



                                            <input type="number" id="postal" name="postal" placeholder="Codigo Postal"
                                                class=" border border-gray-300 rounded-lg px-2.5 h-8">



                                            <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad"
                                                class=" border border-gray-300 rounded-lg px-2.5 h-8"
                                                autocomplete="address-level2">


                                        </nav>
                                        <span id="mensajeErr" class="text-danger"></span>
                                    </div>

                                    <div class="mt-3 flex justify-center">
                                        <button
                                            class="text-claro bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg text-sm p-2"
                                            onclick="updateDireccion()">Añadir
                                            nueva direccion <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <!--Cambiar contraseña-->
                <div class="mt-14 ">
                    <form action="{{ route('resetPassword') }}" method="post" class=" ">

                        <div class="flex flex-col gap-2 xl:items-start items-center ">
                            @csrf
                            <span class="font-medium text-2xl">Cambiar Contraseña:</span>
                            <h3 class="font-medium">Contraseña actual:</h3>
                            <input type="text" id="password" name="password"
                                class=" border border-gray-300  text-sm rounded-lg px-2.5 w-60 xl:w-full">

                            @if (session('noCoinciden'))
                                <span class="text-danger">
                                    {{ session('noCoinciden') }}
                                </span>
                            @endif

                            <h3 class="font-medium">Nueva contraseña:</h3>
                            <input type="text" id="password2" name="password2"
                                class=" border border-gray-300  text-sm rounded-lg px-2.5 w-60 xl:w-full">

                            @error('password2')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror

                            <input type="text" id="password22" name="password22"
                                class=" border border-gray-300  text-sm rounded-lg px-2.5 w-60 xl:w-full">

                            @error('password22')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>

                        <div class=" flex justify-center mt-3">
                            <button type="submit"
                                class="text-claro bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg text-sm p-2">
                                Resetear contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!--pedidos antiguos-->
            <div class="flex flex-col items-center p-3 col-span-2">
                <h2 class="font-medium text-xl">Historial de pedidos:</h2>
                @if (!$pedidos)

                    <div id="notificacion"
                        class="notificacion bg-primario text-coral-50 p-3 border border-coral-50 rounded-lg mt-7">
                        <nav class="flex justify-between">
                            <h4 class="font-semibold">Aun no realizo ningun pedido</h4>
                        </nav>
                        <div class="container text-claro flex justify-center mt-3">

                            <a href="{{ route('impresion') }}" class=" ">
                                <button type="button"
                                    class="text-white bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg px-5  py-2 ">
                                    Hacer pedido
                                </button>
                            </a>

                        </div>
                    </div>
                @else
                    <div class=" overflow-y-auto h-96 rounded-lg mt-7 mb-4 ">
                        <table class=" text-sm text-left bg-gray-50 rounded-lg">
                            <thead class=" uppercase bg-primario text-claro" style="position: sticky; top: 0;">
                                <tr>
                                    <th scope="col" class="px-2 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-2 py-3">
                                        Coste
                                    </th>
                                    <th scope="col" class="px-2 py-3">
                                        Archivo
                                    </th>

                                    <th scope="col" class="px-2 py-3">
                                        Pedido
                                    </th>
                                    
                                    <th scope="col" class="px-2 py-3">
                                        Entrega <br> estimada
                                    </th>

                                    <th scope="col" class="px-1 py-3">
                                        Enviado
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedidos as $pedido)
                                    <tr class="bg-white border-b  hover:bg-gray-400 cursor-pointer enlace">
                                        <td class="px-1 py-2 ">
                                            {{ $pedido->id }}
                                        </td>
                                        <td class="px-1 py-2">
                                            {{ $pedido->precio }}€
                                        </td>
                                        <td class="px-1 py-2 ">
                                            {{ preg_replace('/[\d-]+/', '', $pedido->nombreArchivo) }}


                                        </td>

                                        <td class="px-1 py-2 text-center">
                                            {{ \Carbon\Carbon::parse($pedido->created_at)->format('Y-m-d') }}
                                        </td>

                                        <td class="px-1 py-2 text-center">
                                            {{ \Carbon\Carbon::parse($pedido->updated_at)->addDays(2)->format('Y-m-d') }}
                                        </td>

                                        <td class="px-1 py-2">
                                            @if ($pedido->hecho)
                                                <span class="flex items-center justify-center gap-1">
                                                    
                                                    <i class="fa-solid fa-circle-check text-turquoise-400"></i>
                                                </span>
                                            @else
                                                <span class="flex items-center justify-center gap-1">
                                                    
                                                    <i class="fa-solid fa-circle-xmark text-danger "></i>
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif
            </div>
        </div>

    </div>
    <!--token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        function updateDireccion(id) {

            let nombre = document.getElementById('nombre').value
            let apellido = document.getElementById('apellido').value
            let calle = document.getElementById('calle').value
            let provincia = document.getElementById('provincia').value
            let ciudad = document.getElementById('ciudad').value
            let postal = document.getElementById('postal').value


            let id_user = {{ Auth::user()->id }}

            const ajax = new XMLHttpRequest();
            const form = new FormData();
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            ajax.onreadystatechange = function() {
                if (this.response) {
                    let response = JSON.parse(this.response);

                    if (response.error) {
                        // Mostrar mensaje de error
                        document.getElementById('mensajeErr').innerHTML = response.error;
                    } else {
                        // Mostrar los datos del usuario
                        document.getElementById('direccion').innerHTML = response.direccion;
                        document.getElementById('MostrarNombre').innerHTML = response.nombre;
                        document.getElementById('MostrarApellido').innerHTML = response.apellido;
                    }
                }
            };

            //formar el formulario para enviarlo
            form.append('nombre', nombre);

            form.append('apellido', apellido);
            form.append('calle', calle);
            form.append('provincia', provincia);
            form.append('ciudad', ciudad);
            form.append('postal', postal);

            form.append('id_user', id_user)
            form.append('_token', token);
            ajax.open('POST', "{{ route('updateDireccion') }}");
            ajax.send(form);



        }
    </script>
@endsection
