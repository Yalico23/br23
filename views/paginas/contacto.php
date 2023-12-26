<main class="contenedor seccion">
    <h1>Contacto</h1>
    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado)); //intval lo convierte  un entero
        if ($mensaje) { ?> <p class="alerta exito"><?php echo $mensaje ?></p><?php }
    }
    ?>
        
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>
    <h2>Llene el formulario de contacto</h2>
    <form class="formulario" action="/contacto" method="post">
        <fieldset>
            <legend>Informacion personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu nombre" id="nombre" name="nombre" required>


            <label for="mensaje">Mensaje: </label>
            <textarea id="mensaje" name="mensaje" required></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion sobre la propiedad</legend>

            <label for="opciones">Vende o compra</label>
            <select name="opciones" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o presupuesto</label>
            <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="presupuesto" required>
        </fieldset>
        <fieldset>

            <legend>Información sobre la propiedad</legend>

            <p>Como desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono" required>

                <label for="contactar-email">E-mail</label>
                <input name="contacto" type="radio" value="email" id="contactar-email" required><!--el name me sirve para leerlo en php y solo uno pueda ser escogido-->
            </div>

            <div id="contacto">

            </div>
            <div id="contacto">

            </div>



        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>

</main>