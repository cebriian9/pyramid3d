@extends('layout.formato')

@section('tittle', 'registro')

@section('contenido')
    <form action="{{route('registrarse')}}" method="post">
        @csrf
        usuario: <input type="text" name="usuario" value="{{old('usuario')}}"><br>
        @error('usuario')
            <br>
            <h2>*{{$message}}</h2>
            <br>
        @enderror
        correo: <input type="text" name="email" value="{{old('email')}}"><br>
        @error('email')
            <br>
            <h2>*{{$message}}</h2>
            <br>
        @enderror
        contraseña: <input type="text" name="password" value=""><br>
        @error('password')
            <br>
            <h2>*{{$message}}</h2>
            <br>
        @enderror
        contraseña2: <input type="text" name="password2" value=""><br>
        @error('password2')
            <br>
            <h2>*{{$message}}</h2>
            <br>
        @enderror
        <input type="checkbox" name="remember" > Mantener sesion iniciada
        <button type="submit">registrar</button>

    </form>
@endsection
