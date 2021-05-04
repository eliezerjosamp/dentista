<?php
/*variables de datos*/
    $server ='localhost';
    $username = 'root';
    $password ='';//contraseña de la base de datos
    $database ='login_php_database';
/**/
    try{
        /*variable conexion*/
        $conn=new PDO("mysql:host=$server;dbname=$database;",$username,$password);
        /*error de conexion*/
    }catch(PDOException $e){
        die('Conected failed: '.$e->getMessage());

    }

?>