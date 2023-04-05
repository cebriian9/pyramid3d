@extends('layout.formato')

@section('tittle', 'registro')

@section('contenido')
    <form action="{{ route('inicioSes') }}" method="post">
        @csrf
        usuario: <input type="text" name="usuario" value="{{ old('usuario') }}"><br>
        @error('usuario')
            <br>
            <h2>*{{ $message }}</h2>
            <br>
        @enderror

        contraseña: <input type="text" name="password" value=""><br>
        @error('password')
            <br>
            <h2>*{{ $message }}</h2>
            <br>
        @enderror

        <input type="checkbox" name="remember"> Mantener sesion iniciada

        <button type="submit">registrar</button>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </form>
@endsection
