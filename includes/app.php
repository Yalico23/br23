<?php 
    require __dir__ . '/funciones.php';
    require __dir__ . '/config/database.php';
    require __DIR__.'/../vendor/autoload.php';


    $db = conectarDB();

    use Model\ActiveRecord;
    
    ActiveRecord::setDB($db);

    
?>
