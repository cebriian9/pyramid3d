@extends('layout.formato')

@section('tittle', 'Pyramid3D')

@section('contenido')
<meta name="description" content="Comienza ya a darle forma a tus ideas">
<style>
    .bg-cabecera {
        background-image: url({{ URL::asset('imagenes/cabecera.jpg')}});
    height: 50vh;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }

    .bg-cabecera-cover {
        background-color: #00203881;
        height: 50vh;
    }

    .section-index {
        height: 500px;
    }

    @media (max-width: 768px) {
        .bg-cabecera {
            height: 40vh;
        }

        .bg-cabecera-cover {
            height: 40vh;
        }

        .section-index {
            height: 400px;
        }
    }

    .notificacion {
    position: fixed;
    top: 100px;
    right: 1%;
    
    
}



</style>
<!--cabecera-->
<div class="h-96 bg-cabecera">
    <div class="bg-cabecera-cover text-claro flex flex-col gap-5 justify-center items-center">
        <h1
            class=" font-semibold text-2xl md:text-5xl lg:text-6xl text-center mx-6 ring ring-claro rounded-2xl p-3 pb-4 ">
            Comienza ya a darle forma a tus ideas
        </h1>

        <a href="@auth {{ route('impresion') }} @else {{ route('registro') }} @endauth"
            class="text-lg md:text-xl lg:text-2xl">
            <button type="button"
                class="text-white bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg px-32 md:px-52  py-2  md:mr-0 hidden sm:block">
                ¡Comienza a Imprimir!
            </button>
        </a>

    </div>
</div>

<section class="font-sans">
    <!--ola-->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220">
        <path fill="#002038" fill-opacity="1"
            d="M0,96L40,112C80,128,160,160,240,181.3C320,203,400,213,480,186.7C560,160,640,96,720,69.3C800,43,880,53,960,80C1040,107,1120,149,1200,170.7C1280,192,1360,192,1400,192L1440,192L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
        </path>
    </svg>
    <!--1-section-->
    <div class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 p-10 pb-14 mt-10">
        <span class="flex justify-center mb-10">
            <h1 class=" text-lg md:text-2xl lg:text-4xl font-semibold mx-6  rounded-md p-2 ">¡Imprime lo que
                quieras!</h1>
        </span>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="order-2 md:order-1 flex justify-center">
                <!--foto-->
                <img src="{{ URL::asset('imagenes/section.index.jpg') }}" class="section-index h-full rounded-lg"
                    alt="section-index">
            </div>
            <div class="order-1 md:order-2">
                <!--lista de cosas-->
                <ul class="flex flex-col gap-14 justify-center text-lg">
                    <li>
                        <span class=" flex text-3xl font-semibold">
                            <h1 class="">1.</h1>
                            <h1><i class="fa-solid fa-upload"></i> Mandanos tus diseños </h1>
                        </span>
                        <div>
                            <span class="font-bold">¿Ya tienes tus diseños?</span> ¡¡Perfecto!! No dudes en enviarlo
                            cuanto antes para ponernos a trabajar
                        </div>
                    </li>
                    <li>
                        <span class=" flex text-3xl font-semibold">
                            <h1 class="">2.</h1>
                            <h1><i class="fa-solid fa-clock-rotate-left"></i> Espera y relajate </h1>
                        </span>
                        <div>
                            Una vez lo hayas subido simplemente espera, relajate y despreocupate. <span
                                class="font-bold">¡Nosotros nos encargamos!</span>
                        </div>
                    </li>
                    <li>
                        <span class=" flex text-3xl font-semibold">
                            <h1 class="">3.</h1>
                            <h1><i class="fa-solid fa-truck"></i> Recibe tu pedido </h1>
                        </span>
                        <div>
                            <span class="font-bold">¡Ya lo tenemos!</span> Espera unos dias a que llegue tu pedido
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--1-section-->

    <div class="container text-claro flex justify-center my-20">

        <a href="@auth{{ route('impresion') }}@else{{ route('registro') }} @endauth"
            class="text-lg md:text-xl lg:text-2xl">
            <button type="button"
                class="text-white bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg px-32 md:px-52  py-2  md:mr-0 hidden sm:block">
                ¡Comienza a Imprimir!
            </button>
        </a>

    </div>

    <!--2-section-->
    <div class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 p-5 sm:p-10 pb-14 mt-10 mb-24">
        <nav class="text-center mb-10">
            <h3 class=" font-semibold tracking-tight text-4xl ">Principales usos</h3>
        </nav>
        <div class=" grid grid-cols-1 md:grid-cols-2 gap-5">

            <div class="flex flex-col items-center bg-claro  rounded-lg  text-xl">
                <i class="fa-solid fa-shuttle-space text-5xl m-3"></i>
                <div class="flex flex-col justify-between p-4 pt-0">
                    <h5 class="mb-2 text-center font-bold tracking-tight text-gray-900 ">Prototipos</h5>
                    <p class="mb-3   ">Quieres empezar a probar tus nuevos inventos, la impresion 3d es la opcion ideal
                        para ello.</p>
                </div>
            </div>

            <div class="flex flex-col items-center bg-claro  rounded-lg  text-xl">
                <i class="fa-solid fa-industry text-5xl m-3"></i>
                <div class="flex flex-col justify-between p-4 pt-0">
                    <h5 class="mb-2 text-center font-bold tracking-tight text-gray-900 ">Industria</h5>
                    <p class="mb-3   ">Ya probaste tus prototipos? Es hora de dar el paso y fabricar tu producto final.
                    </p>
                </div>
            </div>

            <div class="flex flex-col items-center bg-claro  rounded-lg  text-xl">
                <i class="fa-solid fa-snowman text-5xl m-3"></i>
                <div class="flex flex-col justify-between p-4 pt-0 ">
                    <h5 class="mb-2 text-center font-bold tracking-tight text-gray-900 ">Decoracion</h5>
                    <p class="mb-3   ">Necesitas una decoracion unica? Crea tus propios objetos de decoracion unicos.
                    </p>
                </div>
            </div>

            <div class="flex flex-col items-center bg-claro  rounded-lg  text-xl">
                <i class="fa-solid fa-vihara text-5xl m-3"></i>
                <div class="flex flex-col justify-between p-4 pt-0 ">
                    <h5 class="mb-2 text-center font-bold tracking-tight text-gray-900 ">Arquitectura</h5>
                    <p class="mb-3   ">Gracias a esta tecnologia podras dar un nivel extra a tus proyectos.</p>
                </div>
            </div>

        </div>
    </div>
    <!--2-section-->

    <div class="container text-claro flex justify-center my-20">

        <a href="@auth{{ route('impresion') }}@else{{ route('registro') }} @endauth"
            class="text-lg md:text-xl lg:text-2xl">
            <button type="button"
                class="text-white bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg px-32 md:px-52  py-2  md:mr-0 hidden sm:block">
                ¡Comienza a Imprimir!
            </button>
        </a>

    </div>

    <div class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 p-5 sm:p-10 pb-14 mt-10 mb-24">
        <nav class="text-center mb-10">
            <h3 class=" font-semibold tracking-tight text-4xl ">Principales usos</h3>
        </nav>
    </div>

    <!--  -->


</section>

<!--boton flotante-->
<nav class="text-claro fixed left-0 right-0 mx-auto text-center bottom-11 z-50">
    <a href="@auth {{ route('impresion') }} @else {{ route('registro') }} @endauth" class="block sm:hidden">
        <button type="button"
            class="text-claro bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg px-28  py-2  md:mr-0">
            Comenzar
        </button>
    </a>
</nav>

<!--notificacion-->
@if (!Auth::user()->direccion)

<div id="notificacion" class="notificacion bg-primario text-coral-50 p-3 border border-coral-50 rounded-lg">
    <nav class="flex justify-between">
        <h4 class="font-semibold">Complete su perfil</h4>
        <button id="cerrar-notificacion" class="cerrar-notificacion"><i class="fa-solid fa-x"></i></button>
    </nav>
    <p>Tu dirección está vacía. Por favor, actualízala en tu perfil o pinche <a href="{{ route('cuenta') }}" class="text-secundario-50">AQUI</a>.</p>
    
</div>
@endif


<script>
    // Obtener referencia al botón de cerrar y a la notificación
    var cerrarBtn = document.getElementById('cerrar-notificacion');
    var notificacion = document.getElementById('notificacion');

    // Agregar evento clic al botón de cerrar
    cerrarBtn.addEventListener('click', function() {
        notificacion.style.display = 'none'; // Ocultar la notificación
    });
</script>

@endsection