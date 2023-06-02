@extends('layout.formato')

@section('tittle', 'Confirmar pago')

@section('contenido')
<div class="container bg-claro rounded-xl md:w-3/4 lg:w-3/5 md:p-10 p-14 mt-10 mb-24">

    <h1 class="font-bold text-2xl text-center mb-5">Confirmar compra:</h1>

    <div class="grid md:grid-cols-2">

        <div class="flex flex-col gap-1">
            <span class="font-medium text-2xl">Datos del cliente:</span>
          
            <nav><span class="font-bold">Nombre:</span> <span>{{ Auth::user()->nombre }}</span></nav>
            <nav><span class="font-bold">Apellidos:</span> <span>{{ Auth::user()->apellido }}</span></nav>
            <nav><span class="font-bold">Correo:</span> <span>{{ Auth::user()->email }}</span></nav>
            <nav><span class="font-bold">Direccion de envio:</span> <span>{{ Auth::user()->direccion }}</span></nav>
        </div>
    
        <div class=" md:hidden flex justify-center">
            <hr class="h-px w-2/3 my-8 bg-gray-200 border-primario ">
        </div>
        
        <div class="flex flex-col gap-1">
            
            <span class="font-medium text-2xl">Datos de compra:</span>

            <nav><span class="font-bold">Material:</span> <span>{{ $pedido->material }}</span></nav>
            <nav><span class="font-bold">Relleno:</span> <span>{{ $pedido->relleno }}%</span></nav>
            <nav><span class="font-bold">Calidad:</span> <span>{{ $pedido->calidad }} mm</span></nav>
            <nav><span class="font-bold">Tamaño:</span> <span>{{ $pedido->tamano }} mm</span></nav>

            
        </div>
    </div>

    <div class="hidden md:flex justify-center ">
        <hr class="h-px w-2/3 my-8 bg-gray-200 border-primario ">
    </div>
    <h3 class="font-medium text-2xl text-center">Datos del pago:</h3>

    <form id="payment-form" action="{{ route('confirmarPago') }}" method="post" class="flex flex-row  justify-center gap-4">
        @csrf
        <input type="text" name="pedido" value="{{ $pedido }}" hidden>
        <div>
            <div id="card-element" class="bg-gray-50 rounded-lg p-3 m-3 w-96">
                <!-- Stripe.js insertará el elemento de la tarjeta aquí -->
            </div>
            
        </div>
        <div class="flex justify-center items-center">
            <button id="submit-button" type="submit"
                class="text-claro flex justify-center items-center bg-secundario-50 hover:bg-secundario-100 font-semibold rounded-lg px-28  py-2">
                Pagar
            </button>
        </div>
        
    </form>
    <div id="card-errors" role="alert" class="text-danger text-center">

    </div>

    
</div>


<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe("{{ config('services.stripe.key') }}");
    var elements = stripe.elements();
    var cardElement = elements.create('card');

    cardElement.mount('#card-element');

    var form = document.getElementById('payment-form');
    var submitButton = document.getElementById('submit-button');

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        submitButton.disabled = true;

        stripe.createToken(cardElement).then(function (result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
                submitButton.disabled = false;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var tokenInput = document.createElement('input');
        tokenInput.setAttribute('type', 'hidden');
        tokenInput.setAttribute('name', 'stripeToken');
        tokenInput.setAttribute('value', token.id);
        form.appendChild(tokenInput);
        form.submit();
    }
</script>

@endsection