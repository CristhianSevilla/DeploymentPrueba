<?php
$mensaje = $_GET['mensaje'] ?? null;
?>

<main class="main contenedor-formulario">

    <?php
    foreach ($errores as $error) :;
    ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <?php
    $notificacion = mostrarNotificacion(intval($mensaje));
    if ($notificacion) : ?>
        <p class="alerta exito"><?php echo s($notificacion);  ?></p>
    <?php endif; ?>

    <form method="POST" class="formulario" novalidate>
        <fieldset>
            <legend>Inicia Sesión</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="E-mail" id="email">

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Contraseña" id="password">

            <div class="alinear-derecha">
                <input type="submit" value="Iniciar Sesión" class="boton">
            </div>
        </fieldset>
    </form>

    <div class="opciones">
        <div>
            <a class="boton" href="/registrar">Registrarme</a>
        </div>
    </div>

</main>