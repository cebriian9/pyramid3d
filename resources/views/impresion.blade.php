@extends('layout.formato')

@section('tittle', 'impresion')

@section('contenido')
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>



    <section class=" m-12">
        @if (!Auth::user()->nombre)
            <div id="notificacion" class="notificacion bg-primario text-coral-50 p-3 border border-coral-50 rounded-lg mb-8">
                <nav class="flex justify-between">
                    <h4 class="font-semibold">Completa tu perfil</h4>
                </nav>
                <p>Tus datos de envio estan vacios. Por favor, actualízalos en tu perfil o pinche <a
                        href="{{ route('cuenta') }}" class="text-secundario-50">AQUI</a>.</p>
            </div>
        @endif

        <form action="{{ route('crearImpresion') }}" method="post" enctype="multipart/form-data" id="formulario"
            class="">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 sm:gap-10 ">

                <div class="col-span-2 ">
                    <span class="text-2xl font-semibold flex justify-between">

                        <h1>Sube tus diseños </h1>
                        <p id="mi-boton" class="text-base cursor-pointer">Eliminar actual <button class="ml-2">
                                <i class="fa-solid fa-x"></i></button>
                        </p>
                    </span>

                    <div class="flex flex-col items-center justify-center gap-3">

                        <div id="vista" class=" border-2 border-primario border-dashed rounded-lg h-96 w-full">

                        </div>

                        <div class="flex justify-center ">

                            <label for="inputFile" id="input"
                                class=" flex flex-col items-center justify-center p-2 border-2 border-primario border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-secundario-gray-200">
                                <div class="flex  justify-center ">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p class="text-center mb-2 m-3">
                                        <span class="font-semibold">
                                            Click para subir archivos
                                        </span>
                                    </p>

                                </div>
                                <!--Cargando-->
                                <div class=" justify-center items-center gap-2 hidden" id="status-load">
                                    <span class='text-xl'>Cargando <i class='fa-solid fa-spinner' id='gira'></i></span>
                                </div>
                                <div class=" justify-center items-center gap-2 hidden" id="status-loaded">
                                    <span class='text-xl'>Todo listo <i class="fa-solid fa-check"></i></span>
                                </div>
                                <!--Cargando-->
                                <input id="inputFile" name="stlFile" type="file"
                                    class="hidden rounded-lg p-1 text-sm text-claro bg-secundario-50 cursor-pointer" />
                                @error('stlFile')
                                    <span class="text-danger">*{{ $message }}</span>
                                @enderror
                                <span id="errorSTL" class="text-danger"></span>
                            </label>

                        </div>
                        <div class=" hidden sm:flex flex-col items-center gap-3">
                            <p>Controles:</p>
                            <div class="flex justify-between">
                                <p class="flex items-center mr-5"><img src="{{ URL::asset('imagenes/mouse_lef.ico') }}">Giro
                                </p>
                                <p class="flex items-center"><img
                                        src="{{ URL::asset('imagenes/mouse_rig.ico') }}">Movimiento</p>
                            </div>
                        </div>
                    </div>



                </div>


                <div class="flex justify-center">
                    <!--form lateral-->
                    <div class="w-full lg:w-3/4 flex flex-col gap-6 mt-10 sm:mt-0">

                        <!--material-->
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
                                    <input type="radio" id="relleno1" name="relleno" value="20-40" class="hidden peer"
                                        required>
                                    <label for="relleno1"
                                        class="inline-flex items-center justify-between border rounded-lg cursor-pointer p-2.5 
                                peer-checked:border-secundario-50 peer-checked:text-claro peer-checked:bg-secundario-50 hover:text-info-100  ">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">20-40%</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="relleno2" name="relleno" value="50-70" class="hidden peer"
                                        checked required>
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
                            <a href="https://www.3dworks.cl/post/altura-de-capas" target="_blank" class=" text-sm">Altura
                                de
                                capa<i class="fa-regular fa-circle-question"></i></a>
                            <ul class="mt-3 flex justify-between">
                                <li>
                                    <input type="radio" id="calidad1" name="calidad" value="01"
                                        class="hidden peer" required>
                                    <label for="calidad1"
                                        class="inline-flex items-center justify-between border rounded-lg cursor-pointer p-2.5 
                                peer-checked:border-secundario-50 peer-checked:text-claro peer-checked:bg-secundario-50 hover:text-info-100  ">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">0.1mm</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="calidad2" name="calidad" value="02"
                                        class="hidden peer" checked required>
                                    <label for="calidad2"
                                        class="inline-flex items-center justify-between border rounded-lg cursor-pointer p-2.5 
                            peer-checked:border-secundario-50 peer-checked:text-claro peer-checked:bg-secundario-50 hover:text-info-100 ">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">0.2mm</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="calidad3" name="calidad" value="03"
                                        class="hidden peer" required>
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
                            <label for="tamano" class="block text-2xl font-semibold ">Tamaño:</label>
                            <input type="number" id="tamano" name="tamano" placeholder="(10-250)mm" max="250"
                                min="10"
                                class="bg-gray-50 border border-gray-300  text-sm rounded-lg block w-full p-2.5 " required>
                                <span id="errTamano" class="text-danger"></span>
                            @error('tamano')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>



                        @if (!Auth::user()->nombre)
                            <button disabled
                                class="text-claro  flex justify-center bg-secundario-100  font-semibold rounded-lg px-28  py-2">
                                ¡Imprimir!
                            </button>
                        @else
                            <button type="submit"
                                class="text-claro flex justify-center bg-secundario-50 hover:bg-secundario-100  font-semibold rounded-lg px-28  py-2">
                                ¡Imprimir!
                            </button>
                        @endif


                        <div>
                            <span class="text-xl font-semibold ">
                                Precio:<input type="text" name="precio" id="precio" class="ml-2 w-14" disabled>€
                            </span>
                            
                            <p class="text-sm text-gray-500"><i class="fa-regular fa-circle-question"></i>El precio
                                mostrado es el precio por cada unidad</p>
                        </div>
                    </div>
                    <!--//form lateral-->
                </div>

            </div>
        </form>
        <!--token-->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="module">
        import * as THREE from "{{ asset('js/three.module.js') }}";
        import { OrbitControls } from "{{ asset('js/OrbitControls.js') }}";
        import { STLLoader } from "{{ asset('js/STLLoader.js') }}";



        //mensajes de carga
        let status = document.getElementById('status-load')
        let statusLoaded = document.getElementById('status-loaded')

        //ajax
        $(document).ready(function () {
            $("#inputFile").change(function () {

                //var formData = new FormData($("#formulario")[0]);
                //optengo el token para enviarlo
                var token = $('meta[name="csrf-token"]').attr('content');

                var archivo = document.getElementById('inputFile').files[0];

                if (archivo['name'].endsWith('.stl')) {
                    document.getElementById('errorSTL').innerHTML = ""

                    const xhr = new XMLHttpRequest();
                    const form = new FormData();

                    //mensaje de carga
                    status.classList.remove('hidden')
                    status.classList.add('flex')



                    //preparar el formulario ajax
                    form.append('archivo', archivo);
                    form.append('_token', token);//token de seguridad de laravel
                    xhr.open('POST', "{{ route('muestra3D') }}");
                    xhr.send(form);

                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            var respuesta = JSON.parse(xhr.responseText);
                            const ruta = respuesta.ruta;

                            const nuevaRuta = ruta.replace('public', 'storage');

                            cargarSTL(nuevaRuta)
                            //eliminar mensaje de carga
                            status.classList.remove('flex')
                            status.classList.add('hidden')
                            
                            //todo correcto
                            statusLoaded.classList.remove('hidden')
                            statusLoaded.classList.add('flex')

                        }
                    };
                } else {
                    document.getElementById('errorSTL').innerHTML = "*El archivo debe ser un .stl"
                }
            });
        });
        //ajax---


        //visualizador 3d
        let inputFile = document.querySelector('#inputFile')
        let scene, camera, renderer, object;

        function init() {
            //scene
            scene = new THREE.Scene();
            scene.background = new THREE.Color(0x001d33)
            const vista = document.querySelector('#vista');
            //camera
            camera = new THREE.PerspectiveCamera(
                75,
                (vista.offsetWidth) / (vista.offsetHeight)
            );
            camera.position.z = 5;
            camera.position.y = 3
            camera.rotation.x = -0.5

            //renderer
            renderer = new THREE.WebGLRenderer();
            renderer.setSize((vista.offsetWidth - 4), (vista.offsetHeight - 4))
            //renderizar en el div que toca
            vista.appendChild(renderer.domElement);

            //scene.add(object);

            //controles

            let control = new OrbitControls(camera, renderer.domElement)
            control.minDistance = 2
            control.maxDistance = 15
            //control.enablePan = false

            //luces
            let light = new THREE.DirectionalLight(0xffffff);
            light.position.set(-0.1, -0.1, -0.1);
            scene.add(light);

            let light2 = new THREE.DirectionalLight(0xffffff);
            light2.position.set(0.1, 0.1, 0.1);
            scene.add(light2);

            let light3 = new THREE.DirectionalLight(0xffffff);
            light3.position.set(0, 0, -0.1);
            scene.add(light3);

            let light4 = new THREE.DirectionalLight(0xffffff);
            light3.position.set(0, 0, 0.1);
            scene.add(light4);


            const groundSize = 50;
            const gridSpacing = 1;

            // Crear geometría de cuadrícula
            const gridGeometry = new THREE.PlaneGeometry(groundSize, groundSize, groundSize / gridSpacing, groundSize / gridSpacing);

            // Crear material de alambre
            const wireframeMaterial = new THREE.MeshBasicMaterial({
                color: 0xffffff,
                wireframe: true,
                opacity: 0.3,
                transparent: true,
            });

            // Crear malla de cuadrícula y asignarle el material de alambre
            const gridMesh = new THREE.Mesh(gridGeometry, wireframeMaterial);

            // Rotar la malla para que esté orientada horizontalmente
            gridMesh.rotation.x = -Math.PI / 2;

            // Añadir la malla a la escena
            scene.add(gridMesh);

            animate();

            //escalado

            window.addEventListener("resize", function () {
                resize()
            })

            function resize() {
                camera.aspect = (vista.offsetWidth) / (vista.offsetHeight)
                camera.updateProjectionMatrix()
                renderer.setSize((vista.offsetWidth - 4), (vista.offsetHeight - 4))
                renderer.render(scene, camera);
            }



        }

        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }

        //iniciar la escena
        init();


        function cargarSTL(nuevaRuta) {


            //cargar el stl
            let loader = new STLLoader();

            //{{ asset('tmpStorage/nombre_del_archivo') }}
            //storage/1681888457-soportekindlev1.stl

            loader.load(nuevaRuta, (model) => {
                object = new THREE.Mesh(
                    model,
                    new THREE.MeshLambertMaterial({ color: 0xff6f00 })
                );
                object.scale.set(0.05, 0.05, 0.05);
                object.position.set(0, 0, 0);
                object.rotation.x = -Math.PI / 2;
                scene.add(object);
            });
            
        }


        //refrecar datos
        const boton = document.getElementById("mi-boton");
        boton.addEventListener("click", function () {

            location.reload();
        });

        //-------------precio----------
        document.addEventListener("DOMContentLoaded", function () {

            const inpPrecio = document.getElementById("precio");
            const material = document.getElementById("material");
            const tamaño = document.getElementById("tamano");

            const radiosRelleno = document.querySelectorAll('input[name="relleno"]');
            const radiosCalidad = document.querySelectorAll('input[name="calidad"]');


            let relleno
            function handleRellenoChange(event) {
                relleno = event.target.value;
                actualizarPrecio()
            }


            let calidad
            function handleCalidadChange(event) {
                calidad = event.target.value;
                actualizarPrecio()

            }

            radiosRelleno.forEach(radio => {
                radio.addEventListener('change', handleRellenoChange);
            });

            radiosCalidad.forEach(radio => {
                radio.addEventListener('change', handleCalidadChange);
            });

            material.addEventListener("change", function () {
                actualizarPrecio()
            })

            tamano.addEventListener("keyup", function () {
                if (tamano.value<10 || tamano.value>250) {
                    document.getElementById('errTamano').innerHTML="El tamaño debe ser mayor de 10 mm y menor de 250 mm"
                }else{
                   actualizarPrecio() 
                   document.getElementById('errTamano').innerHTML=""
                }
                
            })

            function actualizarPrecio() {

                let precio = 5

                switch (material.value) {
                    case "PLA":
                        //precio = precio + (precio)
                        break;
                    case "ABS":
                        precio = precio + (precio * 0.3)
                        break;
                    case "PTG":
                        precio = precio + (precio * 0.2)
                        break;

                    default:
                        break;
                }

                switch (relleno) {
                    case "20-40":
                        precio = precio - (precio * 0.3)
                        break;
                    case "50-70":

                        break;
                    case "90-100":
                        precio = precio + (precio * 0.2)
                        break;

                    default:
                        break;
                }

                switch (calidad) {
                    case "01":
                        precio = precio + (precio * 0.3)
                        break;
                    case "02":

                        break;
                    case "03":

                        precio = precio - (precio * 0.3)
                        break;

                    default:
                        break;
                }
                //tamaño
                precio = precio + (precio + tamano.value / 10)

                //console.log("precio", precio);
                inpPrecio.value = precio.toFixed(2)
            }

            // Inicializar el precio
            actualizarPrecio();
        });


        
        // animacion de carga
        function girarElemento() {
            const elemento = document.getElementById("gira");
            let grados = 0;
            let velocidad = 1; // Ajusta la velocidad de la rotación aquí

            
            function rotar() {
                grados += velocidad;
                elemento.style.transform = `rotate(${grados}deg)`;

                //reiniciar la rotación
                if (grados >= 360) {
                    grados = 0;
                }

                // Siguiente fotograma de animación
                requestAnimationFrame(rotar);
            }

            rotar();
        }
        girarElemento();
    </script>

    </section>

@endsection
