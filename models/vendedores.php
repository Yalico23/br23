<?php 
namespace Model;

class Vendedores extends ActiveRecord {
    protected static $tabla = 'vendedores';
    protected static $columnasBD = ['Id','Nombre','Apellido','Telefono'];

    public $Id;
    public $Nombre;
    public $Apellido;
    public $Telefono;

    public function __construct($args = []) //Recibe un array -> $_POST de crear.php o actualizar.php
    {
        $this->Id = $args['Id'] ?? '';
        $this->Nombre = $args['Nombre'] ?? '';
        $this->Apellido = $args['Apellido'] ?? '';
        $this->Telefono = $args['Telefono'] ?? '';
    }
    public function validar()
    {
        
        !$this->Nombre ? self::$errores[] = "Debes añadir un nombre" : '';
        !$this->Apellido ? self::$errores[] = "Debes añadir un apellido" : '';
        !$this->Telefono ? self::$errores[] = "Debes añadir un celular" : '';
        
        if (!preg_match('/[0-9]{9}/',$this->Telefono)) { //389 - rango entre 0-9  con 9 digitos - EXPRESIONES REGULARES PHP
            self::$errores[]='Formato telefono no valido';
        }
        return self::$errores;
    }
}

?>