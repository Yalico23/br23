<?php 
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login']??null;//da un true o false
//debuguear($auth);
if (!isset($inicio)) {
    $inicio=false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real State</title>
    <link rel="preload" href="../build/css/app.css" as="style" onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="../build/css/app.css">
    <meta name = "author" content= "Oscar Yalico Espinoza">
    <meta name= "copyright" content = "Derechos reservados">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''?>"> <!--Validando para que la clase inicio de la imagen solo se de en inicio-->
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/"> <!--Forma de llevar a la pagina principal-->
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono responsive">
                </div>
                
                <div class="derecha">
                    <img class="dark-mode-button" src="/build/img/dark-mode.svg" alt="icono oscuro">
                    <nav class="navegacion">
                        <a  href="/nosotros">About us</a>
                        <a  href="/anuncios">Ads</a>
                        <a  href="/blog">Blog</a>
                        <a  href="/contacto">Contact</a>
                        <?php if($auth):?>
                            <a href="/logout">Log Out</a>
                        <?php else:?>
                            <a href="/login">Log In</a>
                        <?php endif;?>
                    </nav>
                </div>
                
            </div><!--Cierre de barra-->

            <?php
            echo $inicio ? '<h1>Sale of Exclusive Luxury Houses and Apartments  </h1>' : '';//ternario

            ?>
        </div>
    </header>
    
<?php echo $contenidoInsideLayout ?>

    <!-- Incio del Footer -->
    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros">Nosotros</a>
                <a href="anuncios">Anuncios</a>
                <a href="blog">Blog</a>
                <a href="contacto">Contacto</a>
            </nav>
        </div>
    <!---->
        <?php
            /*$fecha=date('d-m-Y'); //d = day; m = month; y = year (23); Y = (2023)
            echo $fecha;*/
        ?>
        <p class="copyright">Todos los derechos Reservados <?php echo date('Y') ?> &copy; - Yalico Espinoza Oscar</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script><!--Lo estoy llamando desde el index con la funcion comprobar-->
</body>

</html>