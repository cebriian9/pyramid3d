<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tittle')</title>
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-900">
    <div class="flex flex-col cursor-no-drop">
        <h3 class="text-blue-600 ">Estas en pyramid</h3>
        <a href="{{ route('registro') }}">registro</a>
        <a href="{{ route('inicioSesion') }}">iniciar sesion</a>
        <a href="{{ route('logOut') }}">Cerrar Sesion</a>
        <a href="{{ route('privada') }}">privativo</a>
    </div>
    @yield('contenido')
</body>

</html>
