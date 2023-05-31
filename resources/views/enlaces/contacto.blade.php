@extends('layout.formato')

@section('tittle', 'Contacto')

@section('contenido')

<div class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 p-4 sm:p-20 my-20">
    <div class="flex justify-center ">
        <h2 class="text-2xl">Formulario de contacto</h2>
    </div>

    <div class="flex justify-center mt-10">
        <form action="{{ route('enviarMensaje') }}" method="POST" class=" w-5/6">
            @csrf

            <div>
                @if (!Auth::user())
                <h3 class="font-medium">Nombre:</h3>
                <input type="text" id="usuario" name="usuario"
                    class=" border border-gray-300  text-sm rounded-lg px-2.5 p-1 w-full">
                @else
                <h3 class="font-medium">Usuario:</h3>
                <input type="text" id="usuario" name="usuario" value="{{ Auth::user()->usuario }}"
                    class=" border border-gray-300  text-sm rounded-lg px-2.5 p-1 w-full " readonly>
                @endif
            </div>

            <div>
                <h3 class="font-medium">Asunto:</h3>
                <input type="text" id="asunto" name="asunto"
                    class=" border border-gray-300  text-sm rounded-lg px-2.5 p-1 w-full" required>
            </div>

            <div>
                <h3 class="font-medium">Mensaje:</h3>


                <textarea name="mensaje" id="mensaje" cols="" rows=""
                    class="border border-gray-300  text-sm rounded-lg px-2.5 p-1 w-full " required></textarea>
            </div>

            <div>
                @if (session('enviado'))
                <div class="text-turquoise-400 font-semibold">
                    {{ session('enviado') }} <i class="fa-solid fa-check"></i>
                </div>
                @endif
                @if (session('fallo'))
                <div class="text-danger font-semibold">
                    {{ session('fallo') }}
                </div>
                @endif
            </div>

            <div class="flex justify-center mt-10">
                <button type="submit"
                    class="text-claro flex justify-center bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg  px-28 py-2">
                    Enviar
                </button>
            </div>

        </form>

        
    </div>
</div>



@endsection