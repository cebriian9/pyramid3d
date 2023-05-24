@extends('layout.formato')

@section('tittle', 'Sobre nosotros')

@section('contenido')

<div class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 p-4 sm:p-20 my-10">
    <div class="flex justify-center">
        <h2 class="text-2xl">Sobre nosotros</h2>
    </div>

    <div class="flex flex-col gap-5 mt-10">

        <p>
            Somos una tienda en línea especializada en <b>impresión 3D bajo demanda</b>. En nuestra tienda, puedes enviar tus
            diseños y nosotros nos encargaremos de hacerlos realidad. Nos apasiona convertir tus ideas en objetos
            tangibles y personalizados.
        </p>
        <div class="flex justify-center ">
            <img src="{{URL::asset('imagenes/sobreNosotros.jpg')}}" class="foto rounded-lg"
                alt="foto ilustradora de impresion 3D">
        </div>
        <p>
            Nuestro objetivo es ofrecerte la <b>máxima personalización</b> en tus proyectos de impresión 3D. Puedes
            personalizar parámetros específicos de impresión para obtener resultados que se ajusten a tus necesidades y
            preferencias. Queremos que tus diseños cobren vida de la manera exacta en la que los has imaginado.
        </p>
        <p>
            Llevamos <b>más de 3 años</b> dedicándonos a la impresión 3D, el diseño de prototipos y la creación de piezas
            personalizadas. Durante este tiempo, hemos adquirido experiencia y conocimientos para ofrecerte un servicio
            de calidad y resultados excepcionales.
        </p>
        <p>
            Además, nos preocupamos por brindarte un <b>servicio accesible</b>. Realizamos envíos a toda España de la forma más
            rapida posible, para que puedas disfrutar de nuestros servicios sin preocuparte por nada.
        </p>
        <p>
            Estamos entusiasmados por dar a conocer la maravillosa tecnología de impresión 3D a más personas y ayudar a
            materializar sus ideas. <b>Nos encantaría ser parte de tus proyectos y hacerlos realidad.</b>
        </p>

        
    </div>
</div>

<style>
    .foto {

        width: 50%;
    }

    @media (max-width: 1100px) {
        .foto {

            width: 100%;
        }
    }
</style>
@endsection