@extends('layout.formato')

@section('tittle', 'Pago confirmado')

@section('contenido')
<div class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 md:p-10 p-14 mt-10 mb-24 ">

    <div class="flex items-center justify-center flex-col gap-5 p-14">
        <h2 class="font-bold text-2xl">Pedido Confirmado</h2>
        <i class="fa-solid fa-circle-check text-turquoise-400 text-5xl"></i>
        <a href="{{route('index')}}">
            <button id="submit-button" 
                class="text-claro flex justify-center items-center bg-secundario-50 hover:bg-secundario-100 font-semibold rounded-lg px-16  py-2">
                Volver al inicio
            </button>
        </a>
    </div>
    
</div>

@endsection