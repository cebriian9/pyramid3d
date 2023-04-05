@extends('layout.formato')

@section('tittle','inicio')

@section('contenido')
<h3>estas en inicio</h3>
<br>
<p>hola: @auth {{Auth::user()->usuario}} @else invitado @endauth </p>
@endsection