<?php 
namespace Model;

class Admin extends ActiveRecord{
    
    protected static $tabla = 'usuarios';
    protected static $columnasBD = ['idUsuarios','email','password'];

    public $idUsuarios;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->idUsuarios = $args['idUsuarios'] ?? null;
        $this->email = $args['email'] ?? null;
        $this->password = $args['password'] ?? null;
    }

    public function validar(){
        !$this->email ? self::$errores[] = "E-mail is requeried" : "";
        !$this->password ? self::$errores[] = "Password is required" : "";

        return self::$errores;
    }
    public function UserExisct(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        
        $resultado = self::$db->query($query);
        
        if (!$resultado->num_rows) {
            self::$errores[] = 'El Usuario no existe';
            return;//se devuelve null para terminar el proceso pero agregamos un parametro a $errores
        }
        return $resultado;
    }
    public function CheckPassword($resultado){
        $usuario = $resultado->fetch_object();//recuperar la siguiente fila de un conjunto de resultados como un objeto en PHP
        $autenticado = password_verify($this->password/*password en memoria*/, $usuario->password/**password en la BD */);
        //password_verify devuelve un true o false
        if (!$autenticado) {
            self::$errores[] = 'Contraseña Incorrecta';
        }

        return $autenticado;
    }

    public function autenticar(){
        session_start();
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header("Location: /admin");
    }
}
?>