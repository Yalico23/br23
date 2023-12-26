<?php
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/'); //el path del server seria : C:\Users\Oscar\Desktop\BienesRaices-MVC\public debido a que el localhost se inicio dentro del

function incluirTemplate(string $nombre, bool $inicio = false)
{
    //echo TEMPLATES_URL."/$nombre.php"; //
    include  TEMPLATES_URL . "/$nombre.php"; //codigo antes del require app : "includes/templates/$nombre.php"; 
}

function estadoAutenticado() //archivo login.php  
{
    session_start();
    if (!$_SESSION['login']) {
        header("Location:/");
    }
}
function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo)
{
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;
        case 4:
            $mensaje = 'MENSAJE ENVIADO CORRECTAMENTE';
            break;
        case 5:
            $mensaje = 'MENSAJE NO ENVIADO CORRECTAMENTE';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarRedireccionar($URL)
{
    //validar la URL po ID valido
    $Id = $_GET['Id'];
    $Id = filter_var($Id, FILTER_VALIDATE_INT);

    if (!$Id) {
        header("Location: $URL");
    }

    return $Id;
}
