<?php // debuguear($propiedades) ?>
<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado)); //intval lo convierte  un entero
        if ($mensaje) { ?> <p class="alerta exito"><?php echo $mensaje ?></p><?php }
    }
    ?>

    <a href="/propiedades/crear" class="boton-verde">Nueva propiedad</a>
    <a href="/vendedores/crear" class="boton-amarillo">Nuevo Vendedor</a>

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propiedades as $propiedad) : ?>
                <tr>
                    <td> <?php echo $propiedad->Id; ?> </td> <!--Se cambio para iterar para objetos-->
                    <td> <?php echo $propiedad->Titulo; ?> </td>
                    <td><img src="/imagenes/<?php echo $propiedad->Imagen ?>" class="imagen-tabla" alt="imagen"></td>
                    <td>$ <?php echo $propiedad->Precio; ?> </td>
                    <td>
                        <form method="POST" class="w-100" action="propiedades/eliminar">
                            <input type="hidden" name="Id" value="<?php echo $propiedad->Id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo boton" value="Eliminar">
                        </form>
                        <a href="/propiedades/actualizar?Id=<?php echo $propiedad->Id ?>" class="boton-amarillo 
                        boton">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

    <h2>Vendedores</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendedores as $vendedor) : ?>
                <tr>
                    <td><?php echo $vendedor->Id; ?></td> <!--Se cambio para iterar para objetos-->
                    <td><?php echo $vendedor->Nombre . " " . $vendedor->Apellido; ?></td>
                    <td><?php echo $vendedor->Telefono; ?></td>
                    <td>
                    <form method="POST" class="w-100" action="vendedores/eliminar">
                            <input type="hidden" name="Id" value="<?php echo $vendedor->Id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo boton" value="Eliminar">
                        </form>
                        <a href="/vendedores/actualizar?Id=<?php echo $vendedor->Id ?>" class="boton-amarillo 
                        boton">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</main>