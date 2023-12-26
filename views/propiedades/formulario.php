<fieldset>
    <legend>Informacion general</legend>
    <label for="titulo">Titulo:</label>
    <input autocomplete="off" autofocus type="text" id="titulo" placeholder="Titulo Propiedad" name="Titulo" value="<?php echo  $propiedad->Titulo; //para insertar datos de la variable y no perder nada
                                                                                        ?>">

    <!--usar el name permite a un script acceder a su contenido-->
    <label for="Precio">Precio en S/.:</label>
    <input autocomplete="off" type="number" id="Precio" placeholder="Precio Propiedad" name="Precio" step="any" value="<?php echo $propiedad->Precio ?>"><!--Usamos el step any para los decimales-->

    <label for="Imagen">Imagen:</label>
    <input autocomplete="off" type="file" id="Imagen" accept="image/jpeg, image/png , image/webp" name="Imagen"> <!--multiple para subir mas de un archivo-->

    <?php if ($propiedad->Imagen) : ?>
        <img src="/imagenes/<?php echo $propiedad->Imagen ?>" alt="Imagen" class="imagen-small">
    <?php endif; ?>

    <label for="Descripcion">Descripcion:</label>
    <textarea id="Descripcion" name="Descripcion"><?php echo $propiedad->Descripcion ?></textarea>
</fieldset>
<fieldset>
    <legend>Informacion de la propiedad</legend>

    <label for="Num_habitaciones">Habitaciones:</label>
    <input autocomplete="off" type="number" id="Num_habitaciones" name="Num_habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $propiedad->Num_habitaciones ?>">

    <label for="servicio_higienico">Baños:</label><!--wc = baños-->
    <input autocomplete="off" type="number" id="servicio_higienico" name="servicio_higienico" placeholder="Ej: 3" min="1" max="9" value="<?php echo $propiedad->servicio_higienico ?>">

    <label for="Estacionamiento">Estacionamiento:</label><!--wc = baños-->
    <input autocomplete="off" type="number" id="Estacionamiento" name="Estacionamiento" placeholder="Ej: 3" min="0" max="9" value="<?php echo $propiedad->Estacionamiento ?>">
</fieldset>
<fieldset>
    <legend>Vendedor</legend>
    <label for="vendedor">Vendedor</label>
    <select name="Vendedores_Id" id="vendedor">
            <option value="" disabled selected>--Seleccione un vendedor--</option>
        <?php foreach ($vendedores as $vendedor):?>
            <option <?php echo $propiedad->Vendedores_Id === $vendedor->Id ? 'selected' : ''; ?>
            value="<?php echo $vendedor->Id ?>"><?php echo $vendedor->Nombre . " " . $vendedor->Apellido;?></option>
        <?php endforeach; ?>
    </select>
</fieldset>