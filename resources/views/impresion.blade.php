@extends('layout.formato')

@section('tittle', 'impresion')

@section('contenido')

<section class=" m-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <div class="col-span-2  ">
            <span class="text-2xl font-semibold">
                <h1>1. Sube tus diseños </h1>
            </span>

            <div id="drag-drop" class="flex items-center justify-center ">
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-primario border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-secundario-gray-200">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                            </path>
                        </svg>
                        <p class="text-center mb-2 m-3"><span class="font-semibold">Click para subir upload</span> or
                            arrastra tu archivo</p>
                        <p class=" ">Solo archivos .stl</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden sm:block" />
                </label>
            </div>

        </div>

        <div class="w-full sm:w-3/4">
            <form action="" method="post" enctype="multipart/form-data" class="flex flex-col gap-6">

                <div>
                    <label for="material" class="block text-2xl font-semibold ">Selecciona el matrial:</label>
                    <select name="material" id="material"
                        class=" border text-gray-900 text-sm rounded-lg  w-full  p-2.5 hover:text-info-100">
                        <option>PLA</option>
                        <option>ABS</option>
                        <option>PTG</option>
                    </select>
                </div>

                <div>


                    <ul class=" flex justify-between">
                        <li >
                            <input type="radio" id="relleno1" name="relleno" value="20-40" class="hidden peer" required>
                            <label for="relleno1"
                                class="inline-flex items-center justify-between border rounded-lg cursor-pointer p-2.5 
                                peer-checked:border-secundario-50 peer-checked:text-claro peer-checked:bg-secundario-50 hover:text-info-100  ">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">20-40%</div>
                                </div>
                            </label>
                        </li>
                        <li >
                            <input type="radio" id="relleno2" name="relleno" value="50-70" class="hidden peer" required>
                            <label for="relleno2"
                                class="inline-flex items-center justify-between border rounded-lg cursor-pointer p-2.5 
                            peer-checked:border-secundario-50 peer-checked:text-claro peer-checked:bg-secundario-50 hover:text-info-100 ">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">50-70%</div>
                                </div>
                            </label>
                        </li>
                        <li >
                            <input type="radio" id="relleno3" name="relleno" value="90-100" class="hidden peer" required>
                            <label for="relleno3"
                                class="inline-flex items-center justify-between border rounded-lg cursor-pointer p-2.5 
                            peer-checked:border-secundario-50 peer-checked:text-claro peer-checked:bg-secundario-50 hover:text-info-100 ">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">90-100%</div>
                                </div>
                            </label>
                        </li>
                    </ul>

                </div>
            </form>
        </div>
    </div>
</section>

@endsection