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
    <div>
        <h3 class="text-blue-600 ">Estas en pyramid3d test</h3>
        <a href="{{ route('registro') }}">registro</a>
        <a href="{{ route('inicioSesion') }}">iniciar sesion</a>
        <a href="{{ route('logOut') }}">Cerrar Sesion</a>
        <a href="{{ route('privada') }}">privativo</a>
        <p>hola: @auth {{Auth::user()->usuario}} @else invitado @endauth </p>
    </div>
    <!--menu-->
    <nav class="bg-primario text-claro w-full top-0 border">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{route('index')}}" class="flex items-center">
                <img src="{{URL::asset('imagenes/logo.png')}}" class="w-7 sm:w-14 mr-3" alt="Logo">
                <span class="self-center text-2xl font-semibold ">Pyramid3D</span>
            </a>
            <div class="flex md:order-2">
                @auth
                <span class="flex items-center justify-center gap-2">
                    <i class="fa-solid fa-user"></i> 
                    {{Auth::user()->usuario}}
                </span>
                @else
                <nav class="gap-3 flex">
                    <a href="{{route('inicioSesion')}}">
                        <button type="button"
                            class="text-white bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg px-4 py-2  md:mr-0">
                            Iniciar sesión
                        </button>
                    </a>

                    <a href="{{route('registro')}}" class="hidden sm:block">
                        <button type="button"
                            class="text-white bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg px-4 py-2  md:mr-0">
                            Comenzar
                        </button>
                    </a>
                </nav>
                @endauth

                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>aaaaaaa <br> sssssssss <br> aaaaaaaaaaaa <br> aaaaaaaaaaa
    <!--//menu-->
    @yield('contenido')

    <nav class="text-claro fixed left-0 right-0 mx-auto text-center bottom-11 z-50">
        <a href="@auth {{route('privada')}} @else {{route('registro')}} @endauth" class="block sm:hidden">
            <button type="button"
                class="text-white bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg px-28  py-2  md:mr-0">
                Comenzar
            </button>
        </a>
    </nav>
</body>

</html>