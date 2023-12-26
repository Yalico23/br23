<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController; //Nota: la clase siempre debe de tener el nombre del archivo
use Controllers\VendedoresController;
use Controllers\PaginasController;
use Controllers\LoginController;

$router = new Router();

//Zona privada
$router->get("/admin", [PropiedadController::class, 'index']);
//Propiedades
$router->get("/propiedades/crear", [PropiedadController::class, 'crear']);
$router->post("/propiedades/crear", [PropiedadController::class, 'crear']);
$router->get("/propiedades/actualizar", [PropiedadController::class, 'actualizar']);
$router->post("/propiedades/actualizar", [PropiedadController::class, 'actualizar']);
$router->post("/propiedades/eliminar", [PropiedadController::class, 'eliminar']);
//Vendedores
$router->get("/vendedores/crear", [VendedoresController::class, 'crear']);
$router->post("/vendedores/crear", [VendedoresController::class, 'crear']);
$router->get("/vendedores/actualizar", [VendedoresController::class, 'actualizar']);
$router->post("/vendedores/actualizar", [VendedoresController::class, 'actualizar']);
$router->post("/vendedores/eliminar", [VendedoresController::class, 'eliminar']);

/*zona publica*/
//Paginas 
$router->get("/",[PaginasController::class,'index']);
$router->get("/nosotros",[PaginasController::class,'nosotros']);
$router->get("/blog",[PaginasController::class,'blog']);
$router->get("/entrada",[PaginasController::class,'entrada']);
$router->get("/contacto",[PaginasController::class,'contacto']);
$router->post("/contacto",[PaginasController::class,'contacto']);
$router->get("/anuncios",[PaginasController::class,'anuncios']);
$router->get("/anuncio",[PaginasController::class,'anuncio']);

//Login y auntenticacion
$router->get("/login",[LoginController::class,'login']);
$router->post("/login",[LoginController::class,'login']);
$router->get("/logout",[LoginController::class,'logout']);

$router->comprobarRutas();
?>