<?php

namespace MVC;

class Router
{

    public $rutasGET = []; //Cada vez que uso get se llenara tipo $errores[]
    public $rutasPOST = [];

    //Esta funcion tendra un comportamiento cuando sea de tipo get
    //$url = URL actual o la que estamos visitando
    //$fn = funcion asociada a esa URL

    public function  get($url, $fn)
    {
        $this->rutasGET[$url] = $fn; //llenaremos el arreglo
    }
    
    public function  post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn; //llenaremos el arreglo
    }

    public function comprobarRutas()
    {   
        //Proteger las rutas 1
        session_start();
        $auth = $_SESSION['login']??null;//retorna un true o null
        //debuguear($auth);
        $rutas_protegidas = ["/admin","/propiedades/crear","/propiedades/actualizar","/propiedades/eliminar","/vendedores/crear","/vendedores/actualizar","/vendedores/eliminar"];

        //work URL
        $urlActual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/'; //name url

        $metodo = $_SERVER['REQUEST_METHOD']; //GET or POST
        
        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null; //tendre la funcion segun el directorio donde estoy si no sera nullo
            //debuguear($fn);
        }elseif($metodo === 'POST'){
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //Proteger las rutas 2

        if (in_array($urlActual,$rutas_protegidas) && !$auth) {//si esta en una ruta protegida y no esta autenticado:
            header("Location: /");
        }else { // Agrego este else con el siguiente if
            //Cuando el usuario esta autenticado no debería de poder regresar a la pagina de login de registro por ejemplo, mi solución es la siguiente:
                if (($urlActual == "/login" || $urlActual == "/registro") && $auth) {//Evitar rutas si estamos logeados ///registro no existe aun
                    header('Location: /');
                }
        }
        //Haciendo uso de los metodos de los controladores
        if ($fn) { //validar si la funcion exita
            //debuguear($fn); contiene un arreglo 
            //debuguear($this); contiene un los arrays get y post 
            call_user_func($fn, $this); //$this tiene los valores de todos los arreglos tanto get como post, me ejecuta la funcion 
            //Uso ?? en resumen aplica la funcion
        } else {
            echo "Pagina no encontrada ERROR 404";
        }
    }
    //Muestra una vista 
    public function render($view, $datos = []) //sera un arreglo porque le mandaremos diferentes tipos de datos
    {
        //debuguear($datos);
        foreach ($datos as $key => $value) {
            $$key = $value;
        }
//variable de variable 


        ob_start(); //Inicia el almacenamiento de memoria
        include __DIR__ . "/views/$view.php";
        $contenidoInsideLayout = ob_get_clean(); //lo guarda y lo limpia , se encuentra en el layout
        include __DIR__ . "/views/layout.php";
    }
}
