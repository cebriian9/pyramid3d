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
            <p class="text-2xl font-semibold">Revise su correo electronico</p>
        </div>
        
    </div>

</section>

@endsection