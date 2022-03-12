
<main class="inicial">

<section class=" contenedor-grafica">
    <h2>Grafica de colores</h2>

    <canvas id="grafica" width="50" height="50"></canvas>

    <hr>

</section>

<section class="tabla">

    <h2>Tabla de usuarios</h2>

    <table class="usuarios">
        <thead>
            <tr>
                <th>Id</th>
                <th>E-mail</th>
                <th>Contraseña</th>
                <th>Color</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registrar as $usuario) : ?>
                <tr>
                    <td><?php echo $usuario->id;  ?></td>
                    <td><?php echo $usuario->correo;  ?></td>
                    <td><?php echo $usuario->contraseña;  ?></td>
                    <td><?php echo $usuario->colorId;  ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <hr>

    <h2>Tabla de colores</h2>

    <table class="usuarios">
        <thead>
            <tr>
                <th>Id</th>
                <th>Color</th>
                <th>Hexadecimal</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($colores as $color) : ?>
                <tr>
                    <td><?php echo $color->id;  ?></td>
                    <td><?php echo $color->color;  ?></td>
                    <td><?php echo $color->hexadecimal;  ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</section>
</main>

<div class="opciones alinear-derecha contenedor">
<div>
    <a class="boton " href="/logout">Cerrar sesión</a>
</div>
</div>