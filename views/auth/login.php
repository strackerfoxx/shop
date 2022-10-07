<div class="contenedor login">
    
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Iniciar sesion</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <form action="/login" method="POST" class="formulario" novalidate>

            <div class="campo">
                <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Tu email">
            </div>

            <div class="campo">
                <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Tu password">
            </div>

            <input type="submit" class="boton" value="Iniciar Session">
        </form>

        <div class="acciones">
            <a href="/create">¿Aún no tienes una cuenta? Crea una aqui</a>
            <a href="/olvide">¿Olvidaste tu contraseña?</a>
        </div>
    </div>
</div>