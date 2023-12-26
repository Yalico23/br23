
<main class="contenedor seccion">
    <h1>CREAR</h1>

    <?php foreach ($errores as $error) : ?> <!-- Por cada arreglo que tenga funcionara -->
        <div class="alerta error"> <!--Creamos hoja de estilo para las alertas de error-->
            <?php echo $error ?>
        </div>
    <?php endforeach ?> 

    <a href="/admin" class="boton-verde">Volver</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">
    
        <?php include __DIR__.'/formulario.php' ?>

        <input type="submit" value="Crear propiedad" class="boton boton-verde">
    </form>
</main>