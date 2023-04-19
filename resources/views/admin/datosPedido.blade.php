@extends('layout.formato')

@section('tittle', 'AdminPedidos')

@section('contenido')

<section class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 p-10 pb-14 mt-10 mb-24">
    <div class="grid grid-cols-3">
        <a href="{{ route('pedidos') }}" class=""><i class="fa-solid fa-arrow-left text-2xl"></i></a>
        <p class="font-semibold text-2xl text-center">Pedido: <span>{{$pedido->id}}</span></p>
        <p></p>
        
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 font-medium mt-6">
        <div>
            <p class="font-semibold text-xl">Datos de pedido:</p>
            <ul class="list-disc list-inside">
                <li>Material: {{$pedido->material}}</li>
                <li>Relleno: {{$pedido->relleno}} %</li>
                <li>Calidad: {{$pedido->calidad}} mm</li>
                <li>Altura de capa: {{$pedido->tamano}}mm</li>
                <li class="">
                    Hecho:
                    @csrf
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="{{ $pedido->id }}" name="id" class="sr-only peer check-pedido"
                            onclick='updateHecho("{{ $pedido->id }}")' @if ($pedido->hecho) checked @endif>
                        <div
                            class="shadow-gray-900 shadow-sm w-11 h-6 bg-gray-400 peer-focus:outline-none rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-coral-50  after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-secundario-50">
                        </div>

                    </label>

                </li>
            </ul>
        </div>

        <div class="mt-6 sm:mt-0">
            <p class="font-semibold text-xl">Datos del Usuario:</p>
            <ul class="list-disc list-inside">
                <li>Usuario: {{$user->usuario}}</li>
                <li>Correo: {{$user->email}} </li>
                <li>Nombre: {{$user->nombre}}</li>
                <li>Apellidos: {{$user->apellido}}</li>
                <li>Direccion: {{$user->direccion}}</li>
                
            </ul>
        </div>
    </div>
</section>
 <!--token-->
 <meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    function updateHecho(id) {

        const xhr = new XMLHttpRequest();
        const form = new FormData();
        //optengo el token para enviarlo
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        //saco el id del pedido
        form.append('id', id);
        form.append('_token', token);
        xhr.open('POST', "{{ route('updatePedido') }}");
        xhr.send(form);
    }


   
</script>
@endsection