
<main class="main contenedor-formulario">

<!-- imprimir errores -->
<?php foreach ($errores as $error) :  ?>
    <div class="alerta error">
        <?php echo $error ?>
    </div>
<?php endforeach; ?>

<form method="POST" class="formulario" novalidate>
    <fieldset>
        <legend>Datos de usuario</legend>

        <label for="email">E-mail*</label>
        <input type="email" name="email" placeholder="E-mail" id="email" value="<?php echo s($registrar->correo); ?>">

        <label for="password">Contraseña*</label>
        <input type="password" name="password" placeholder="Contraseña" id="password" value="<?php echo s($registrar->contraseña); ?>">

        <label for="password">Selecciona un color*</label>

        <select name="color">

            <option value="">Seleccione un color</option>

            <?php foreach ($colores as $color) : ?>
                <option <?php echo $registrar->colorId === $color->id ? 'selected' : ''; ?>
                value="<?php echo s($color->id); ?>">
                <?php echo s($color->color); ?></option>
            <?php endforeach; ?>

        </select>

        <div class="alinear-derecha">
            <input type="submit" value="Registrarme" class="boton">
        </div>
    </fieldset>
</form>

<div class="opciones">
    <div>
        <a class="boton" href="/">Regresar</a>
    </div>
</div>

</main>
