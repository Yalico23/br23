<main class="contenedor seccion contenido-centrado">
    <h1>Log in</h1>
    <?php foreach($errores as $error): ?>
        <div class="alerta error"><?php echo $error; ?></div>
    <?php endforeach?>
    <form action="/login" class="formulario" method="POST">
        <fieldset>
            <legend>Personal information</legend>
            
            <label for="email">E-mail</label>
            <input type="email" placeholder="Email" id="email" name="email">
            
            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password">

        </fieldset>
        <input type="submit" value="Log In" class="boton-verde">
    </form>
</main>