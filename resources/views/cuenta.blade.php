@extends('layout.formato')

@section('tittle', 'impresion')

@section('contenido')

<div class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 p-10 pb-14 mt-10 mb-24">
    <span class="flex justify-center text-2xl font-semibold">Ajsutes</span>

    <div class="flex flex-col gap-3">
        <nav>Usuario: <input type="text" disabled class="rounded-lg px-3 " value="{{ Auth::user()->usuario }}"></nav>
    <nav>Usuario: <input type="text" disabled class="rounded-lg px-3 " value="{{ Auth::user()->email }}"></nav>
    </div>
</div>

@endsection