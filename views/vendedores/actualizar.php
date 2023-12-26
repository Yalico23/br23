<main class="contenedor seccion">
    <h1>Actualizar Vendedor</h1>
    <a href="/admin" class="boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?> <!-- Por cada arreglo que tenga funcionara -->
        <div class="alerta error"> <!--Creamos hoja de estilo para las alertas de error-->
            <?php echo $error ?>
        </div>
    <?php endforeach ?> <!--Gustos personales pero funciona-->

    <form  class="formulario" method="POST">

        <?php include __DIR__ . '/formulario.php' ?>

        <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">
    </form>
</main>