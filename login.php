<?php
//error a corregir no 
  session_start();/*verificacion de cesion*/

  if (isset($_SESSION['user_id'])) {/**/
    header('Location: /Dentista');
  }
  require 'database.php';/**/

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $message = 'paso 1';
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');/*saca datos de base de datos*/
    $message = 'paso 1';/*variable mensaje*/
    $records->bindParam(':email', $_POST['email']);/*obtener parametro y vincular*/
    $records->execute();/*ejecutar consulta*/
    $results = $records->fetch(PDO::FETCH_ASSOC);/*obtencion de datos del usuario*/

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])){//) {/*si resultados no estan y contraseñas iguales */
        $_SESSION['user_id'] = $results['id'];/*almacena en variable sesion*/
        $_SESSION['active']=true;
        header("Location: /Dentista/sistemajava");/*redirigir agina inicial*/
    } else {
      $message = 'Lo sentimos tus credenciales no coinciden';/*mensaje de error de logeo*/
    }
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php require 'partials/header.php'?>
    
    <?php if(!empty($message)): /*si el mensaje no esta basio*/?>
      <p> <?= $message /*mostrar en parrafo*/?></p>
    <?php endif; ?>

    <h1>Iniciar sesion</h1>
    <span>or <a href="registrarse.php">Registrarse</a></span>
    <form action="login.php" method="post">
    <input type="text"name="email" placeholder="ingrese su email">
    <input type="password" name="password" placeholder="ingrese contraseña">
    <input type="submit" value="enviar">
    </form>
    
</body>
</html>