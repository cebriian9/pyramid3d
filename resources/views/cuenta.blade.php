@extends('layout.formato')

@section('tittle', 'impresion')

@section('contenido')

    <div class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 p-10 pb-14 mt-10 mb-24">
        <span class="flex justify-center text-2xl font-semibold items-baseline gap-2"> <i
                class="fa-solid fa-user"></i>Ajsutes</span>

        <div class="flex flex-col gap-6">

            <div class="flex flex-col gap-1">
                <span class="font-medium text-2xl">Datos:</span>
                <nav><span class="font-bold">Usuario:</span> <span>{{ Auth::user()->usuario }}</span></nav>
                <nav><span class="font-bold">Correo:</span> <span>{{ Auth::user()->email }}</span></nav>

                <nav><span class="font-bold">Nombre:</span> <span>{{ Auth::user()->nombre }}</span></nav>
                <nav><span class="font-bold">Apellidos:</span> <span>{{ Auth::user()->apellido }}</span></nav>
            </div>

            <div class="flex flex-col gap-1">

                <span class="font-medium text-2xl">Direccion:</span>
                <div class="flex flex-col gap-3">
                    <nav><span class="font-bold">Dirección:</span> <span id="direccion">
                            @if (Auth::user()->direccion == null)
                                <span class="text-danger">**Rellene el formulario para completar la cuenta**</span>
                            @else
                                {{ Auth::user()->direccion }}
                            @endif
                        </span>
                    </nav>
                    <nav class="flex flex-col gap-1">


                        <h3 class="font-medium">Añadir nueva dirección:</h3>
                        Nombre: <input type="text" id="nombre" name="nombre"
                            class=" border border-gray-300  text-sm rounded-lg px-2.5">

                        Apellido: <input type="text" id="apellido" name="apellido"
                            class=" border border-gray-300  text-sm rounded-lg px-2.5">

                        Calle: <input type="text" id="calle" name="calle"
                            class=" border border-gray-300  text-sm rounded-lg px-2.5">


                        Nº: <input type="number" id="numero" name="numero"
                            class=" border border-gray-300  text-sm rounded-lg px-2.5">


                        Provincia: <input type="text" id="provincia" name="provincia"
                            class=" border border-gray-300  text-sm rounded-lg px-2.5">


                        Postal: <input type="number" id="postal" name="postal"
                            class=" border border-gray-300  text-sm rounded-lg px-2.5">


                        Ciudad: <input type="text" id="ciudad" name="ciudad"
                            class=" border border-gray-300  text-sm rounded-lg px-2.5">



                        <div class="mt-3 flex justify-center">
                            <button
                                class="text-claro bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg text-sm p-2"
                                onclick="updateDireccion()">Añadir
                                nueva direccion <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </nav>
                </div>
            </div>

            <div class=" ">
                <form action="{{ route('resetPassword') }}" method="post" class="flex flex-col gap-3">
                    @csrf
                    <span class="font-medium text-2xl">Cambiar Contraseña:</span>
                    <h3 class="font-medium">Contraseña actual:</h3>
                    <input type="text" id="password" name="password"
                        class=" border border-gray-300  text-sm rounded-lg px-2.5">
                    @if (session('noCoinciden'))
                        <span class="text-danger">
                            {{ session('noCoinciden') }}
                        </span>
                    @endif

                    <h3 class="font-medium">Nueva contraseña:</h3>
                    <input type="text" id="password2" name="password2"
                        class=" border border-gray-300  text-sm rounded-lg px-2.5">
                    @error('password2')
                        <span class="text-danger">*{{ $message }}</span>
                    @enderror
                    <input type="text" id="password22" name="password22"
                        class=" border border-gray-300  text-sm rounded-lg px-2.5">

                    @error('password22')
                        <span class="text-danger">*{{ $message }}</span>
                    @enderror

                    <div class="flex justify-center">
                        <button type="submit"
                            class="text-claro bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg text-sm p-2">
                            Resetear contraseña
                        </button>
                    </div>
                </form>
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
            let numero = document.getElementById('numero').value
            let provincia = document.getElementById('provincia').value
            let ciudad = document.getElementById('ciudad').value
            let postal = document.getElementById('postal').value

            console.log(calle + numero + provincia + ciudad);
            let id_user = {{ Auth::user()->id }}

            const ajax = new XMLHttpRequest();
            const form = new FormData();
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            ajax.onreadystatechange = function() {

                document.getElementById('direccion').innerHTML = this.responseText;
            };
            form.append('nombre', nombre);
            form.append('apellido', apellido);
            form.append('calle', calle);
            form.append('numero', numero);
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
