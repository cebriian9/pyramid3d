@extends('layout.formato')

@section('tittle', 'impresion')

@section('contenido')

<div class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 md:p-10 pb-14 mt-10 mb-24">
    <span class="flex justify-center text-2xl font-semibold items-baseline gap-2"> 
        <i class="fa-solid fa-user mt-10 md:mt-0"></i>Ajustes</span>

    <div class="flex flex-col gap-6 px-14">

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
                        <span class="text-danger">**Rellena los datos para completar la cuenta</span>
                        @else
                        {{ Auth::user()->direccion }}
                        @endif
                    </span>
                </nav>
                <div class="flex justify-center">
                    <div id="accordion-collapse" data-accordion="collapse" class="mt-10">
                        <h2 id="accordion-collapse-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-64 p-3   bg-secundario-50 hover:bg-secundario-100 rounded-t-xl "
                                data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                                aria-controls="accordion-collapse-body-1">
                                <span class="text-claro">Añadir nueva dirección</span>
                                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0 text-claro" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-1" class="hidden w-full" aria-labelledby="accordion-collapse-heading-1">
                            <div class="p-2 border border-secundario-50 rounded-b-xl">
                                
    
                                <div class="flex flex-col items-center">
                                    <h3 class=" mb-3">Añadir nueva dirección:</h3>
                                    <nav class="grid grid-cols-1 sm:grid-cols-2 gap-1 w-full">
    
                                        <input type="text" id="nombre" name="nombre" placeholder="Nombre"
                                            class=" border border-gray-300 rounded-lg px-2.5 h-8">
    
    
                                        <input type="text" id="apellido" name="apellido" placeholder="Apellidos"
                                            class=" border border-gray-300 rounded-lg px-2.5 h-8">
    
    
                                        <input type="text" id="calle" name="calle" placeholder="Dirección"
                                            class=" border border-gray-300 rounded-lg px-2.5 h-8">
    
    
    
                                        <input type="number" id="numero" name="numero" placeholder="Numero"
                                            class=" border border-gray-300 rounded-lg px-2.5 h-8">
    
    
    
                                        <input type="text" id="provincia" name="provincia" placeholder="Provincia"
                                            class=" border border-gray-300 rounded-lg px-2.5 h-8">
    
    
    
                                        <input type="number" id="postal" name="postal" placeholder="Codigo Postal"
                                            class=" border border-gray-300 rounded-lg px-2.5 h-8">
    
    
    
                                        <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad"
                                            class=" border border-gray-300 rounded-lg px-2.5 h-8">
    
    
                                    </nav>
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
        </div>




        <!--Cambiar contraseña-->
        <div class="mt-14 ">
            <form action="{{ route('resetPassword') }}" method="post" class="flex flex-col gap-3 items-center ">
                @csrf
                <span class="font-medium text-2xl">Cambiar Contraseña:</span>
                <h3 class="font-medium">Contraseña actual:</h3>
                <input type="text" id="password" name="password"
                    class=" border border-gray-300  text-sm rounded-lg px-2.5 w-60">

                @if (session('noCoinciden'))
                <span class="text-danger">
                    {{ session('noCoinciden') }}
                </span>
                @endif

                <h3 class="font-medium">Nueva contraseña:</h3>
                <input type="text" id="password2" name="password2"
                    class=" border border-gray-300  text-sm rounded-lg px-2.5 w-60">

                @error('password2')
                <span class="text-danger">*{{ $message }}</span>
                @enderror

                <input type="text" id="password22" name="password22"
                    class=" border border-gray-300  text-sm rounded-lg px-2.5 w-60">

                @error('password22')
                <span class="text-danger">*{{ $message }}</span>
                @enderror

                <div class="ml-10">
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
        let id_user = {{ Auth:: user() -> id }}

    const ajax = new XMLHttpRequest();
    const form = new FormData();
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    ajax.onreadystatechange = function () {

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