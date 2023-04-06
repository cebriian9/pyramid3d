<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('tittle')</title>
        @vite('resources/css/app.css')
        <link rel="shortcut icon" href="{{URL::asset('imagenes/logo.png')}}" type="image/x-icon">
    
    </head>
<body>
    @yield('contenido')
</body>
</html>