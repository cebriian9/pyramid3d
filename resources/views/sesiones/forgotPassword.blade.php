@extends('layout.nada')

@section('tittle', 'Olvidaste la contraseña')

@section('contenido')

<section class="flex justify-center items-center bg-beige h-screen ">

    <div class="bg-primario p-6 rounded-2xl text-claro w-96 ">
        <div class="flex flex-col items-center mb-10">
            <!--foto-->
            <a href="{{route('index')}}">
                <img src="{{URL::asset('imagenes/logo.png')}}" class="w-32" alt="Logo...">
            </a>
            <p class="text-2xl font-semibold">¿Olvidaste tu contraseña?</p>
        </div>
        <form action="{{ route('forgotPassword') }}" method="post" class="grid gap-5 ">
            @csrf
            <div>
                <label for="email"
                    class="block ">Introduce tu email:</label>

                <input type="text" name="email" id="email" value="{{ old('email') }}"
                    class="rounded-xl p-1 text-primario w-full">
                @error('email')
                <span class="text-danger">*{{ $message }}</span>
                @enderror
                @if (session('error'))
                        <span class="text-danger">
                            {{ session('error') }}
                        </span>
                    @endif
            </div>
            <div>
                <button type="submit" class="bg-secundario-50 p-1 rounded-full w-full font-medium hover:bg-secundario-100">Recuperar contraseña</button>
            </div>
        </form>
    </div>

</section>

@endsection