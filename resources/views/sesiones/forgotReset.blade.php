@extends('layout.nada')

@section('tittle', 'Crear Contraseña')

@section('contenido')

    <section class="flex justify-center items-center bg-beige h-screen ">

        <div class="bg-primario p-6 rounded-2xl text-claro w-96 ">
            <div class="flex flex-col items-center mb-10">
                <!--foto-->
                <a href="{{ route('index') }}">
                    <img src="{{ URL::asset('imagenes/logo.png') }}" class="w-32" alt="Logo...">
                </a>
                <p class="text-2xl font-semibold">Crea una nueva contraseña</p>
            </div>
            <form action="{{ route('forgotReset') }}" method="post" class="grid gap-5 ">
                @csrf
                <div>
                    <label for="password" class="block ">Nueva Contraseña:</label>
                    <input type="text" name="password" id="password" class="rounded-xl p-1 text-primario w-full">
                    @error('password')
                        <span class="text-danger">*{{ $message }}</span>
                    @enderror


                    <label for="password2" class="block ">Confirmar Contraseña:</label>
                    <input type="text" name="password2" id="password2" class="rounded-xl p-1 text-primario w-full">
                    @error('password2')
                        <span class="text-danger">*{{ $message }}</span>
                    @enderror

                    <input type="text" name="codigo" hidden value="{{$codigo}}">
                </div>
                <div>
                    <button type="submit"
                        class="bg-secundario-50 p-1 rounded-full w-full font-medium hover:bg-secundario-100">
                        Recuperar contraseña
                    </button>
                </div>
            </form>
        </div>

    </section>

@endsection
