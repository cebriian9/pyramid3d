<div style="background-color: #001d33; padding: 1.5rem; border-radius: 1rem; color: #fff1e5;">
    <div style="display: flex;">
        <!--foto-->
        <a href="https://pyramid3d.app/">
            <img src="https://pyramid3d.app//imagenes/logo.png" style="width: 50px;" alt="Logo...">
        </a>
        <p style="font-size: 1.5rem; line-height: 2rem; font-weight: 600;" class="text-xl font-semibold">Recuperación de
            contraseña
        </p>
    </div>


    <div>
        <p style="font-weight: 600; margin-bottom: 30px;">
            Hola, {{$user->usuario}}, haz click en el boton para restaurar la contraseña:
        </p>
        <a href="http://127.0.0.1:8000/sesiones/forgotPassword/{{$user->forgot}}"
            style=" margin-bottom: 30px;--tw-bg-opacity: 1; background-color: #ff6f00; padding: 10px; font-size: 1.25rem; line-height: 1.75rem; border-radius: 9999px; width: 100%;text-decoration: none; color: #fff1e5;">
            Restaurar contraseña
        </a>

        <p style="font-weight: 600;">Si el botón no funciona, pruebe aquí: 
            <a
                href="http://127.0.0.1:8000/sesiones/forgotPassword/{{$user->forgot}}" style="color: #fff1e5;">
                Restaurar Contraseña
            </a>
        </p>
    </div>
</div>