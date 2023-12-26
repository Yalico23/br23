<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{

    public static function index(Router $router)
    { //Le pasamos un objeto, es decir es el mismo objeto que estamos trabajando en el index  para no perder las referencias porque si instanciamos se borraria todo

        $propiedades = Propiedad::all();
        $vendedores = Vendedores::all();
        $resultado = $_GET['resultado'] ?? null; //Los mensajes

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }
    public static function crear(Router $router)
    {

        $propiedad = new Propiedad();
        $vendedores = Vendedores::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $propiedad = new Propiedad($_POST); //Post en un array
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            if ($_FILES['Imagen']['tmp_name']) {
                $Imagen = Image::make($_FILES['Imagen']['tmp_name'])->fit(800, 600);
                $propiedad->SetFiles($nombreImagen);
            }
            $errores = $propiedad->validar();
            if (empty($errores)) {
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                $Imagen->save(CARPETA_IMAGENES . $nombreImagen);
                $propiedad->guardar();
            }
        }

        //agregar las vistas y sus variables
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router)
    {
        $Id = validarRedireccionar('/admin');

        $propiedad = Propiedad::find($Id);
        $vendedores = Vendedores::all();
        $errores = Propiedad::getErrores();
        //post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad->sincronizar($_POST);
            //Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';
            //Subida de archivos
            if ($_FILES['Imagen']['tmp_name']) {
                $Imagen = Image::make($_FILES['Imagen']['tmp_name'])->fit(800, 600);
                $propiedad->SetFiles($nombreImagen);
            }
            //Validar
            $errores = $propiedad->validar();
            if (empty($errores)) {
                
                //Almacenar la imagen
                if (isset($Imagen)) {
                    $Imagen->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
            }
        }

        //agregar las vistas y sus variables
        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $Id = $_POST['Id'];
            $Id = filter_var($Id, FILTER_VALIDATE_INT);
            $tipo = $_POST['tipo']; //Vendedor o propiedad

            if (validarTipoContenido($tipo)) {
                $propiedad = Propiedad::find($Id);
                $propiedad->eliminar();
            }
        }
    }
}
