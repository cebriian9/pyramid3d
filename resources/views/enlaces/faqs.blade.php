@extends('layout.formato')

@section('tittle', 'Preguntas Frecuentes')

@section('contenido')

<div class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 md:p-10 pb-14 mt-10 mb-24">
    <div class="flex justify-center">
        <h2 class="text-2xl">Preguntas frecuentes</h2>
    </div>

    <div class="mt-10">
        <ul class="list-disc flex flex-col gap-5">
            <li class="text-xl font-medium">¿Cuál es el tiempo de producción de mis impresiones 3D?</li>
            <p class="-mt-5">
                El tiempo de producción varía dependiendo del tamaño, complejidad y cantidad de las piezas.
                Generalmente, nuestros tiempos de producción oscilan entre 1 y 3 días hábiles
            </p>

            <li class="text-xl font-medium">¿Cuáles son los materiales disponibles para la impresión 3D?</li>
            <p class="-mt-5">
                Ofrecemos una amplia gama de materiales, incluyendo PLA, ABS, PETG, nylon y resinas. Cada material tiene
                sus propias características y propiedades, y podemos asesorarte para elegir el más adecuado para tu
                proyecto.
            </p>

            <li class="text-xl font-medium">¿Puedo enviar mis propios diseños para imprimir?</li>
            <p class="-mt-5">
                ¡Por supuesto! Aceptamos archivos en formato STL. Solo asegúrate de revisar
                nuestras pautas de diseño para garantizar una impresión exitosa.
            </p>

            <li class="text-xl font-medium">¿Cuál es su política de devoluciones y reembolsos?</li>
            <p class="-mt-5">
                Si recibes una impresión defectuosa o dañada, contáctanos dentro de los 7 días posteriores a la entrega
                para solicitar un reemplazo o un reembolso. Consulta nuestra política completa de devoluciones en
                nuestra página de términos y condiciones.
            </p>

            <li class="text-xl font-medium">¿Puedo realizar pedidos personalizados en grandes cantidades?</li>
            <p class="-mt-5">
                Sí, podemos manejar pedidos personalizados en grandes cantidades. Ponte en contacto con nuestro equipo
                de atención al cliente para discutir tus necesidades específicas y obtener un presupuesto personalizado.
            </p>

            <li class="text-xl font-medium">¿Cómo puedo hacer seguimiento de mi pedido?</li>
            <p class="-mt-5">
                Una vez que tu pedido haya sido enviado, recibirás un correo electrónico con un enlace de seguimiento.
                Podrás rastrear el estado y la ubicación de tu paquete utilizando ese enlace.
            </p>

            <li class="text-xl font-medium">¿Qué métodos de pago aceptan?</li>
            <p class="-mt-5">
                Aceptamos tarjetas de crédito/débito (Visa, Mastercard). También ofrecemos opciones de transferencia
                bancaria para pedidos corporativos.
            </p>

            <li class="text-xl font-medium">¿Puedo solicitar una cotización personalizada para mi proyecto?</li>
            <p class="-mt-5">
                ¡Claro! Si tienes un proyecto especial o requerimientos específicos, puedes completar nuestro formulario
                de cotización en línea o contactarnos directamente. Nuestro equipo estará encantado de ayudarte.
            </p>

        </ul>

    </div>

</div>

@endsection