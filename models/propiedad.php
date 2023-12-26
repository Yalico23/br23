<?php

namespace Model;

class Propiedad extends ActiveRecord
{
    protected static $tabla = 'propiedades';
    protected static $columnasBD = ['Id', 'Titulo', 'Precio', 'Imagen', 'Descripcion', 'Num_habitaciones', 'servicio_higienico', 'Estacionamiento', 'Vendedores_Id', 'creado'];

    public $Id;
    public $Titulo;
    public $Precio;
    public $Imagen;
    public $Descripcion;
    public $Num_habitaciones;
    public $servicio_higienico;
    public $Estacionamiento;
    public $Vendedores_Id;
    public $creado;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? '';
        $this->Titulo = $args['Titulo'] ?? '';
        $this->Precio = $args['Precio'] ?? '';
        $this->Imagen = $args['Imagen'] ?? '';
        $this->Descripcion = $args['Descripcion'] ?? '';
        $this->Num_habitaciones = $args['Num_habitaciones'] ?? '';
        $this->servicio_higienico = $args['servicio_higienico'] ?? '';
        $this->Estacionamiento = $args['Estacionamiento'] ?? '';
        $this->Vendedores_Id = $args['Vendedores_Id'] ?? '';
        $this->creado = date('Y/m/d');
    }

    public function validar()
    {
        // Verifica si el título contiene palabras prohibidas
        $palabrasProhibidas = ['script', 'select', 'update', 'delete'];
        foreach ($palabrasProhibidas as $palabra) {
            if (stripos($this->Titulo, $palabra) !== false) {
                self::$errores[] = "El título contiene una palabra prohibida: $palabra";
            }
            if (stripos($this->Descripcion, $palabra) !== false) {
                self::$errores[] = "En la descripción contiene una palabra prohibida: $palabra";
            }
        }

        !$this->Titulo ? self::$errores[] = "Debes añadir el Titulo" : '';
        if (strlen($this->Titulo) >= 45) {
            self::$errores[] = "El titulo es demasiado largo";
        }
        !$this->Precio ? self::$errores[] = "El Precio es obligatoria" : '';
        if ($this->Precio > 9999999999) {
            self::$errores[] = "El Precio sobrepasa los 10 digitos";
        }
        if (strlen($this->Descripcion) < 50) {
            self::$errores[] = "La Descripcion es obligatoria y tener al menos 50 caracteres";
        }
        !$this->Num_habitaciones ? self::$errores[] = "Debes añadir una cantidad de Num_habitaciones" : '';
        !$this->servicio_higienico ? self::$errores[] = "Debes añadir una cantidad de baños" : '';
        !$this->Estacionamiento ? self::$errores[] = "Debes añadir una cantidad de Estacionamiento" : '';
        !$this->Vendedores_Id ? self::$errores[] = "Debes seleccionar al vendedor" : '';
        !$this->Imagen ? self::$errores[] = "La imagen es obligatoria" : '';

        return self::$errores;
        
    }


}










//Comentario de la clase 370

/** ACOTACIONES DE LOS COMENTARIOS */

/** property_exists() es una función incorporada de PHP que se utiliza para comprobar si una propiedad (o un atributo) específica existe en un objeto.*/

/*El primer argumento de property_exists() es el objeto en el que se va a buscar la propiedad, que se representa en PHP mediante la palabra reservada $this, la cual se refiere al objeto actual en el que se está trabajando.*/

/*El segundo argumento de property_exists() es el nombre de la propiedad que se va a buscar. En este caso, $key es una variable que contiene el nombre de la propiedad que se va a comprobar si existe en el objeto $this.

En el ejemplo que proporcionaste, el código comprueba si la propiedad representada por $key existe en el objeto $this. Si la propiedad existe, se ejecutará el código dentro del bloque if. De lo contrario, el código dentro del bloque if no se ejecutará.

Este tipo de comprobación es útil en situaciones donde se trabaja con objetos dinámicos o cuando no se está seguro de si una propiedad específica existe en el objeto. Por ejemplo, si se está recibiendo un objeto JSON de una solicitud HTTP, se puede utilizar property_exists() para comprobar si una propiedad específica se ha proporcionado en la solicitud antes de intentar acceder a ella.



Te dejo algunas referencias útiles si no te quedo aun muy claro:

https://www.php.net/manual/en/function.property-exists.php

https://lenguajes.com.mx/una-guia-de-la-funcion-property_exists-de-php-con-ejemplos-practicos/ */