<?php

namespace Model;

class ActiveRecord
{
    /** Base de datos */
    protected static $db;//variable que luego tendra la propiedad de la base de datos
    protected static $columnasBD = []; //Clase 366 o 367 -> metodo atributos ... sanitizarAtributos .. guardar
    protected static $tabla = '';
    /**Errores, Validar */
    protected static $errores = [];
    /**En resumen PHP Intelephense te va a estar marcando muchos errores de código ya que ahora espera una sintaxis de PHP 8.2 pero los proyectos del curso están creados con la sintaxis de php 8. Esperar los nuevos cambios no mas */
    public $Id;
    public $Imagen;   
    /******************************************** */
    //BD - > app.php
    public static function setDB($database)//Con la base de datos trabajaremos con el self y las clases aparte con el static
    {
        self::$db = $database;
    }

    /************************************************************** */
    //Inicializamos la variable para no tener un warning message
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar() /**Solo para que herede funcion de validar y cambiamos el self por static */
    {
        static::$errores = [];
        return static::$errores;
    }
    /************************************************************************ */
    /**Identificar y Unir los atributos de la BD CLASE 366*/
    public function atributos()
    {
        /**Se encargara de iterar sobre las columnas DB */
        $atributos = [];
        foreach (static::$columnasBD as $columna) {
            if ($columna === 'Id') continue; // Queremos ignorar por que Id aun no existe
            $atributos[$columna] = $this->$columna; //Se usa $ en la columna porque es una variable y no una propiedad o atributos
        }
        return $atributos;
        //Retornamos un array que contiene la informacion de la pripiedad pero sin sanitizar
    }


    //Evitar inyecciones sql maliciosas

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = []; //$key = Titulo , $value = 'Casa ...'
        foreach ($atributos as $key => $value) { //La llave y su valor
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
    /******************************************** */
    //Subida de archivos
    public function SetFiles($Imagen)
    {
        //Elimina la imagen previa
        //Leemos el Id ya que cuando creamos una propiedad aun no se crea el Id pero al actualizar el Id existe en la BD
        if ($this->Id != '') {
            $this->BorrarImagen();
        }
        //Luego agregamos el nuevo nombre de la Imagen
        if ($Imagen) {
            $this->Imagen = $Imagen;
        }
    }
    public function BorrarImagen()
    {
        //Comprobar si existe el archivo
        $existeimagen = file_exists(CARPETA_IMAGENES . $this->Imagen);
        if ($existeimagen) {
            unlink(CARPETA_IMAGENES . $this->Imagen);
        }
    }
    /******************************************** */
    public function guardar()
    {
        if ($this->Id != '') {
            return $this->actualizar();
        } else {
            return $this->crear();
        }
    }

    public function crear()
    {
        $atributos = $this->sanitizarAtributos();

        $columnas = join(', ', array_keys($atributos));
        $filas = join("', '", array_values($atributos));

        //*  Consulta para insertar datos
        $query = "INSERT INTO " . static::$tabla . " ($columnas) VALUES ('$filas')";

        $resultado = self::$db->query($query);
        if($resultado) {
            // Redireccionar al usuario.
            header('Location: /admin?resultado=1');
        }
    }
    public function actualizar()
    {
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "$key = '$value' ";
        }
        //debuguear($valores); Para percatarse 377
        //debuguear(join(', ', $valores));
        $update = join(', ', $valores);
        $query = "UPDATE " . static::$tabla . " SET $update ";
        $query .= " WHERE Id = '" . self::$db->escape_string($this->Id) . "'";
        $query .= " LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado) {
            header('location: /admin?resultado=2');
        }
    }
    public function eliminar()
    {
        //debuguear("ELiminar....". $this->Id);
        $query = "DELETE FROM " . static::$tabla . " WHERE Id = " . self::$db->escape_string($this->Id) . " LIMIT 1";
        //debuguear($query);
        $resultado = self::$db->query($query);
        if ($resultado) {
            $this->BorrarImagen();
            header('location: /admin?resultado=3');
        }
    }

    /******************************** Lista todas las propiedades **************************************************/
    // Lista todos los registros
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla; 
        $resultado = self::consultaSQL($query);
        return $resultado;
    }
    //Obtiene determinado número de registros
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad; 
        $resultado = self::consultaSQL($query);
        return $resultado;
    }
    // Busca un registro por su Id
    public static function find($Id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE Id = $Id LIMIT 1";
        $resultado = self::consultaSQL($query);
        $resultado = array_shift($resultado); //Elimina el primer elemento del array para que deje de ser un arreglo
        return $resultado; //Retornamos un objeto ya no un array 
    }

    public static function consultaSQL($query)
    {
        $resultado = self::$db->query($query);
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        //Liberar memoria
        $resultado->free();
        return $array;
    }
    //cambia de arreglo a objeto
    protected static function crearObjeto($registro)
    {
        $objeto = new static; //crear una nueva instancia de la clase actual

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
    /**Sincronizar el objeto en memoria con los cambios realizados por el usuario */
    public function sincronizar($args = [])
    { //Tendra un arreglo como parametro de entrada
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) { //374
                $this->$key = $value;
            }
        }
    }
}
