@extends('layout.formato')

@section('tittle', 'impresion')

@section('contenido')

<section class="container m-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <div class="col-span-2 border border-primario">
            <span class="text-2xl font-semibold">
                <h1>1. Sube tus diseños </h1>
            </span>
        </div>

        <div>
            <form action="" method="post" enctype="multipart/form-data">

                <label for="countries" class="block text-2xl font-semibold ">Selecciona el matrial:</label>
                <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-1/2  p-2.5">
                    <option>PLA</option>
                    <option>ABS</option>
                    <option>PTG</option>
                </select>

            </form>
        </div>
    </div>
</section>

@endsection