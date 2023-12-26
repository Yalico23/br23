<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController
{
    public static function login(Router $router)
    {
        //echo "from the login"
        $errores = [];

        $auth = new Admin();
        $errores = Admin::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth  = new Admin($_POST);
            $errores = $auth->validar();

            if (empty($errores)) {
                //Check if the user exists
                $resultado = $auth->UserExisct();
                if (!$resultado) { //En caso de que no se encontro el usuario
                    $errores = Admin::getErrores(); //Cargamos el mensaje y lo mostramos de usuario no existente
                } else {
                    //Check the password
                    $autenticado = $auth->CheckPassword($resultado); //true o false

                    if ($autenticado) {
                        $auth->autenticar();
                    } else {
                        //password equivocado mensaje de error
                        $errores = Admin::getErrores();
                    }
                }
                //Authenticate the user
            }
        }

        $router->render('auth/login', [
            "errores" => $errores
        ]);
    }
    public static function logout(Router $router)
    {   
        session_start();
        //debuguear($_SESSION);
        $_SESSION=[];
        header("Location: /");
    }
}
