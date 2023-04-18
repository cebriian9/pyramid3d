<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }

    .bg-primario {
        background-color: #001d33;
    }

    .p-6 {
        padding: 1.5rem
            /* 24px */
        ;
    }

    .rounded-2xl {
        border-radius: 1rem
            /* 16px */
        ;
    }

    .text-claro {

        color: #fff1e5;
    }

    .w-96 {
        width: 24rem
            /* 384px */
        ;
    }

    .flex {
        display: flex;
    }

    .flex-col {
        flex-direction: column;
    }

    .items-center {
        align-items: center;
    }

    .mb-10 {
        margin-bottom: 2.5rem
            /* 40px */
        ;
    }

    .w-32 {
        width: 8rem
            /* 128px */
        ;
    }

    .text-2xl {
        font-size: 1.5rem
            /* 24px */
        ;
        line-height: 2rem
            /* 32px */
        ;
    }

    .font-semibold {
        font-weight: 600;
    }

    .text-xl {
        font-size: 1.25rem
            /* 20px */
        ;
        line-height: 1.75rem
            /* 28px */
        ;
    }

    .justify-center {
        justify-content: center;
    }

    .bg-secundario-50 {
        --tw-bg-opacity: 1;
        background-color: #ff6f00;
    }

    .p-2 {
        padding: 0.5rem
            /* 8px */
        ;
    }

    .rounded-full {
        border-radius: 9999px;
    }

    .w-full {
        width: 100%;
    }

    .font-medium {
        font-weight: 500;
    }

    .hover\:bg-secundario-100:hover {
        --tw-bg-opacity: 1; 
        background-color: #ff9a4d;
    }
</style>


<div class="bg-primario p-6 rounded-2xl text-claro  ">
    <div class="flex flex-col items-center mb-10">
        <!--foto-->
        <a href="{{route('index')}}">
            <img src="{{URL::asset('imagenes/logo.png')}}" class="w-32" alt="Logo...">
        </a>
        <p class="text-xl font-semibold">Recuperacion de contraseña</p>
    </div>


    <div class="flex justify-center flex-col">
        <p class=" font-semibold">
            Hola, {{$user->usuario}}
        </p>
        <a href="" class="flex justify-center">
            <button type="submit"
                class="bg-secundario-50 p-2 text-xl rounded-full text-claro font-medium hover:bg-secundario-100">
                Restaurar contraseña
            </button>
        </a>

        <p class=" font-semibold">Si el boton no funciona pruebe con pinchando aqui: <a href="">Restaurar Contraseña</a>
        </p>
    </div>
</div>