@extends('layout.nada')

@section('tittle', 'Inicio de sesión')

@section('contenido')
<section class="flex justify-center items-center bg-beige h-screen ">

    <div class="bg-primario p-6 rounded-2xl text-claro w-96 ">
        <div class="flex flex-col items-center mb-10">
            <!--foto-->
            <img src="{{URL::asset('imagenes/logo.png')}}" class="w-32" alt="Logo...">
            <p class="text-2xl font-semibold">Inicio de sesión</p>
        </div>
        <form action="{{ route('inicioSes') }}" method="post" class="grid gap-5 ">
            @csrf
            <div>
                <label for="usuario"
                    class="block ">Usuario</label>

                <input type="usuario" name="usuario" id="usuario" value="{{ old('usuario') }}"
                    class="rounded-xl p-1 text-primario w-full">
                @error('usuario')
                <span class="text-danger">*{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password"
                    class="block ">Contraseña</label>

                <input type="usuario" name="password" id="password" value="{{ old('password') }}"
                    class="rounded-xl p-1 text-primario w-full">
                @error('password')
                <span class="text-danger">*{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="checkbox" name="remember" class="rounded-xl"> Mantener sesion iniciada <br>
                <a href="{{route('registro')}}" class="text-info-100 hover:text-info-50">¿No tienes una cuenta?</a>
            </div>

            <div>
                <button type="submit" class="bg-secundario-50 p-1 rounded-full w-full font-medium hover:bg-secundario-100">Iniciar sesión</button>
            </div>

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        </form>
    </div>

</section>
@endsection