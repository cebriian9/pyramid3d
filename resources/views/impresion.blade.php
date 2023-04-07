@extends('layout.formato')

@section('tittle', 'impresion')

@section('contenido')

<section class=" m-12">
    <form action="{{route('crearImpresion')}}" method="post" enctype="multipart/form-data" class="">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="col-span-2  ">
                <span class="text-2xl font-semibold">
                    <h1>Sube tus diseños </h1>
                </span>

                <div id="drag-drop" class="flex items-center justify-center ">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-primario border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-secundario-gray-200">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p class="text-center mb-2 m-3"><span class="font-semibold">Click para subir upload</span>
                                or
                                arrastra tu archivo</p>
                            <p class=" ">Solo archivos .stl</p>
                        </div>
                        <input id="dropzone-file" name="stlFile" type="file" accept=".stl" class="hidden sm:block" required/>
                    </label>
                </div>
                @error('stlFile')
                <span class="text-danger">*{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full sm:w-3/4 flex flex-col gap-6">


                <div>
                    <label for="material" class="block text-2xl font-semibold ">Selecciona el material:</label>
                    <select name="material" id="material"
                        class=" border text-gray-900 text-sm rounded-lg  w-full  p-2.5 hover:text-info-100">
                        <option>PLA</option>
                        <option>ABS</option>
                        <option>PTG</option>
                    </select>
                </div>

                <!--relleno-->
                <div>
                    <label for="relleno" class="block text-2xl font-semibold ">Cantidad de relleno:</label>
                    <a href="https://blog.prusa3d.com/es/todo-lo-que-necesitas-saber-sobre-el-relleno_43579/"
                        target="_blank" class=" text-sm">relleno<i class="fa-regular fa-circle-question"></i></a>
                    <ul class="mt-3 flex gap-3 justify-between">
                        <li>
                            <input type="radio" id="relleno1" name="relleno" value="20-40" class="hidden peer" required>
                            <label for="relleno1"
                                class="inline-flex items-center justify-between border rounded-lg cursor-pointer p-2.5 
                                peer-checked:border-secundario-50 peer-checked:text-claro peer-checked:bg-secundario-50 hover:text-info-100  ">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">20-40%</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="relleno2" name="relleno" value="50-70" class="hidden peer" checked
                                required>
                            <label for="relleno2"
                                class="inline-flex items-center justify-between border rounded-lg cursor-pointer p-2.5 
                            peer-checked:border-secundario-50 peer-checked:text-claro peer-checked:bg-secundario-50 hover:text-info-100 ">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">50-70%</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="relleno3" name="relleno" value="90-100" class="hidden peer"
                                required>
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

                <!--altura capa-->
                <div>
                    <label for="calidad" class="block text-2xl font-semibold ">Calidad:</label>
                    <a href="https://www.3dworks.cl/post/altura-de-capas" target="_blank" class=" text-sm">Altura de
                        capa<i class="fa-regular fa-circle-question"></i></a>
                    <ul class="mt-3 flex justify-between">
                        <li>
                            <input type="radio" id="calidad1" name="calidad" value="01" class="hidden peer" required>
                            <label for="calidad1"
                                class="inline-flex items-center justify-between border rounded-lg cursor-pointer p-2.5 
                                peer-checked:border-secundario-50 peer-checked:text-claro peer-checked:bg-secundario-50 hover:text-info-100  ">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">0.1mm</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="calidad2" name="calidad" value="02" class="hidden peer" checked
                                required>
                            <label for="calidad2"
                                class="inline-flex items-center justify-between border rounded-lg cursor-pointer p-2.5 
                            peer-checked:border-secundario-50 peer-checked:text-claro peer-checked:bg-secundario-50 hover:text-info-100 ">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">0.2mm</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="calidad3" name="calidad" value="03" class="hidden peer" required>
                            <label for="calidad3"
                                class="inline-flex items-center justify-between border rounded-lg cursor-pointer p-2.5 
                            peer-checked:border-secundario-50 peer-checked:text-claro peer-checked:bg-secundario-50 hover:text-info-100 ">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">0.3mm</div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>

                <div>
                    <label for="tamaño" class="block text-2xl font-semibold ">Tamaño:</label>
                    <input type="number" id="tamaño" name="tamano" placeholder="(10-250)mm" max="250" min="10"
                        class="bg-gray-50 border border-gray-300  text-sm rounded-lg block w-full p-2.5 ">
                        <p class="text-sm text-gray-500">*Dejar vacio para usar el tamaño original de tu diseño</p>
                </div>

                <button type="submit" class="text-claro bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg px-28  py-2">
                    ¡Imprimir!
                </button>

            </div>

        </div>
    </form>


    
</section>

@endsection