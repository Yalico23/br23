<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController
{
    public static function index(Router $router)
    {
        $inicio = true;
        $propiedades = Propiedad::get(3);
        $router->render('paginas/index', [
            "propiedades" => $propiedades,
            "inicio" => $inicio
        ]);
    }
    public static function nosotros(Router $router)
    {
        $inicio = false;
        $router->render('paginas/nosotros', [
            "inicio" => $inicio
        ]);
    }
    public static function anuncios(Router $router)
    {
        $inicio = false;
        $propiedades = Propiedad::all();
        $router->render('paginas/anuncios', [
            "inicio" => $inicio,
            "propiedades" => $propiedades
        ]);
    }
    public static function anuncio(Router $router)
    {
        $inicio = false;
        $Id = $_GET['Id'];
        $Id = filter_var($Id, FILTER_VALIDATE_INT);
        if (!$Id) {
            header('Location: /');
        }
        $propiedad = Propiedad::find($Id);
        $router->render('paginas/anuncio', [
            "inicio" => $inicio,
            "propiedad" => $propiedad
        ]);
    }
    public static function blog(Router $router)
    {
        $inicio = false;
        $router->render('paginas/blog', [
            "inicio" => $inicio
        ]);
    }
    public static function entrada(Router $router)
    {
        $inicio = false;
        $router->render('paginas/entrada', [
            "inicio" => $inicio
        ]);
    }
    public static function contacto(Router $router)
    {
        $inicio = false;
        $resultado = $_GET['resultado'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Valores del formulario
            $respuestas = $_POST;

            //Crear una instancia de PHPMAiler
            $mail = new PHPMailer();
            //configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '0c6a2f346a492d';
            $mail->Password = '053456164e857b';
            $mail->SMTPSecure = 'tls'; //No esta pero lo agrega - es la seguridad
            $mail->Port = 2525;

            //Configurar contenido del email
            $mail->setFrom('admin@bienesraices.com'); //Quien mando el email
            $mail->addAddress('admin@bienesraices.com', 'Bienes Raices'); //Quien lo recibe
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";

            //Definir el Contenido

            $contenido = "<html>";
            $contenido .= "<p>Tienes un nuevo mensaje</p>";
            $contenido .= "<p>Nombre: " . $respuestas['nombre'] . " </p>";

            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= "<p>Elijio ser Contactado por Telefono</p>";
                $contenido .= "<p>Telefono: " . $respuestas['telefono'] . " </p>";
                $contenido .= "<p>Fecha Contacto: " . $respuestas['fecha'] . " </p>";
                $contenido .= "<p>Hora Contacto: " . $respuestas['hora'] . " </p>";
            } else {
                $contenido .= "<p>Elijio ser Contactado por Email</p>";
                $contenido .= "<p>Email: " . $respuestas['email'] . " </p>";
            }

            $contenido .= "<p>Mensaje: " . $respuestas['mensaje'] . " </p>";
            $contenido .= "<p>Vende o Compra: " . $respuestas['opciones'] . " </p>";
            $contenido .= "<p>Presupuesto: S/." . $respuestas['presupuesto'] . " </p>";

            $contenido .= "</html>";

            $mail->Body = $contenido;
            $mail->AltBody = "Esto es texto alternativo sin HTML";

            //Enviar el email
            if ($mail->send()) {
                header("location: /contacto?resultado=4");
            } else {
                header("location: /contacto?resultado=5");
            }
        }

        $router->render('paginas/contacto', [
            "inicio" => $inicio,
            "resultado" => $resultado
        ]);
    }
}
