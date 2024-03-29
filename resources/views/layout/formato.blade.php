<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tittle')</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ URL::asset('imagenes/logo.png') }}" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>


</head>

<body>
    <!--menu-->
    <nav class="bg-primario text-claro w-full top-0 ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('index') }}" class="flex items-center">
                <img src="{{ URL::asset('imagenes/logo.png') }}" class="w-7 sm:w-14 mr-3" alt="Logo">
                <span class="self-center text-2xl font-semibold ">Pyramid3D</span>
            </a>
            <div class="flex md:order-2">
                <!--icono user-->
                @auth
                    <div class="flex items-center ml-3">
                        <div>
                            <button type="button"
                                class="flex rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Abrir menu de usuario</span>
                                <span class="flex items-center justify-center gap-2">

                                    @if (Auth::user()->admin)
                                        <i class="fa-solid fa-user-shield"></i>
                                    @else
                                        <i class="fa-solid fa-user"></i>
                                    @endif

                                    {{ Auth::user()->usuario }}
                                </span>
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow bg-primario"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm font-medium text-claro truncate " role="none">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                            <ul class="py-1 text-claro" role="none">
                                <li>
                                    <a href="{{ route('cuenta') }}" class="block px-4 py-2 text-claro hover:bg-gray-800 "
                                        role="menuitem">Perfil</a>
                                </li>

                                <li>
                                    <a href="{{ route('logOut') }}" class="block px-4 py-2 text-info-100 hover:bg-gray-800 "
                                        role="menuitem">Cerrar Sesion</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                @else
                    <nav class="gap-3 flex">
                        <a href="{{ route('inicioSesion') }}">
                            <button type="button"
                                class="text-white  hover:bg-secundario-50 hover:text-primario  font-semibold rounded-lg px-4 py-2 ring-1 ring-secundario-50  md:mr-0">
                                Iniciar sesión
                            </button>
                        </a>

                        <a href="{{ route('registro') }}" class="hidden sm:block">
                            <button type="button"
                                class="text-white bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg px-4 py-2  md:mr-0">
                                Comenzar
                            </button>
                        </a>
                    </nav>
                @endauth

                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 text-sm  rounded-lg md:hidden focus:outline-none focus:ring-2 "
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Abrir menu</span>
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
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border  rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
                    <li>
                        <a href="{{ route('index') }}" class="block py-2 pl-3 pr-4 text-white "
                            aria-current="Inicio">Inicio</a>
                    </li>
                    <li>
                        <!-- no para admins cambiar para produ-->
                        <a href="{{ route('impresion') }}" class="block py-2 pl-3 pr-4 text-white "
                            aria-current="Impresion">Impresión</a>
                    </li>

                    @auth
                        <a href="{{ route('cuenta') }}" class="block py-2 pl-3 pr-4 text-white md:hidden"
                            aria-current="Cuenta">Cuenta</a>
                    @endauth

                    @auth
                        @if (Auth::user()->admin)
                            <a href="{{ route('pedidos') }}" class="block py-2 pl-3 pr-4 text-white "
                                aria-current="pedidos"><i class="fa-solid fa-user-shield mr-3"></i>Pedidos</a>
                        @endif
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
    <!--//menu-->
    <div class="min-h-screen">
        @yield('contenido')
    </div>

    <!--footer-->

    <footer class=" bg-gray-900 text-claro rounded-t-lg pb-28 sm:pb-0 ">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="{{ route('index') }}" class="flex items-center">
                    <img src="{{ URL::asset('imagenes/logo.png') }}" class="w-7 sm:w-14 mr-3" alt="Logo">
                    <span class="self-center text-2xl font-semibold ">Pyramid3D</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-lg font-medium  sm:mb-0 ">
                    <li>
                        <a href="{{ route('sobreNosotros') }}" class="mr-4 hover:underline md:mr-6 ">Sobre nosotros</a>
                    </li>
                    <li>
                        <a href="{{ route('privacidad') }}" class="mr-4 hover:underline md:mr-6">Políticas de privacidad</a>
                    </li>
                    <li>
                        <a href="{{ route('faqs') }}" class="mr-4 hover:underline md:mr-6 ">FAQs</a>
                    </li>
                    <li>
                        <a href="{{ route('contacto') }}" class="hover:underline">Contacto</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
            <span class="block text-sm  sm:text-center ">© 2023 Pyramid3D™. Todos los derechos reservados.</span>
        </div>
    </footer>

    <!--footer-->


</body>

</html>
