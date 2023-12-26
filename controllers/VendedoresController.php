<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedores;

class VendedoresController
{
    public static function crear(Router $router)
    {
        $vendedor = new Vendedores();
        $errores = Vendedores::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Crear una nueva instancia 
            $vendedor = new Vendedores($_POST);
            //Validar que no exista campos vacios
            $errores = $vendedor->validar();
            //Guardar
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }
        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router)
    {
        $id = $_GET['Id'];
        $vendedor = Vendedores::find($id);
        //Inicializar los erroes
        $errores = Vendedores::getErrores();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Sincronizar objeto en memoria con loq ue el usuario escribio
            $vendedor->sincronizar($_POST);
            //Validar
            $errores = $vendedor->validar();
            //Guardar
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }
        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $Id = $_POST['Id'];
            $Id = filter_var($Id, FILTER_VALIDATE_INT);
            $tipo = $_POST['tipo']; //Vendedor o propiedad

            if (validarTipoContenido($tipo)) {
                $vendedor = Vendedores::find($Id);
                $vendedor->eliminar();
            }
        }
    }
}
