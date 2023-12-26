<fieldset>
    <legend>Informacion General</legend>
    
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" id="Nombre" placeholder="Ingresar Datos" value="<?php echo $vendedor->Nombre ?>">
    
    <label for="Apellido">Apellido</label>
    <input type="text" name="Apellido" id="Apellido" placeholder="Ingresar Datos" value="<?php echo $vendedor->Apellido ?>">
</fieldset>
<fieldset>
    <legend>Datos Adicionales</legend>
    <label for="Telefono">Telefono</label>
    <input type="number" name="Telefono" id="Telefono" placeholder="Ingresar Datos" value="<?php echo $vendedor->Telefono ?>">
</fieldset>