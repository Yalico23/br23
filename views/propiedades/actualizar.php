<main class="contenedor seccion">
    <h1>ACTUALIZAR PROPIEDAD</h1>
    <a href="/admin" class="boton-verde">Volver</a>
    <?php foreach ($errores as $error) : ?> <!-- Por cada arreglo que tenga funcionara -->
        <div class="alerta error"> <!--Creamos hoja de estilo para las alertas de error-->
            <?php echo $error ?>
        </div>
    <?php endforeach ?> <!--Gustos personales pero funciona-->

    <!--Se eliminar el action para no perjudicar el $_GET y manda el formulario al mismo-->
    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include __DIR__.'/formulario.php' ?>

        <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
    </form>
</main>
