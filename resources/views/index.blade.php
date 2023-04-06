@extends('layout.formato')

@section('tittle', 'inicio')

@section('contenido')

    <style>
        .bg-cabecera {
            background-image: url({{ URL::asset('imagenes/cabecera.jpg') }});
            height: 50vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .bg-cabecera-cover {
            background-color: #00203881;
            height: 50vh;
        }

        @media (max-width: 700px) {
            .bg-cabecera {
                height: 40vh;
            }

            .bg-cabecera-cover {
                height: 40vh;
            }
        }
    </style>

    <div class="h-96 bg-cabecera">
        <div class="bg-cabecera-cover text-claro flex justify-center items-center">
            <h1 class=" font-semibold text-2xl md:text-5xl lg:text-6xl text-center mx-6 ring ring-claro p-3 pb-4 ">Comienza ya darle forma a tus ideas</h1>
        </div>
    </div>

@endsection
