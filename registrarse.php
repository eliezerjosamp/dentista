<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'sea creado nuevo usuario satisfactiriamente';
    } else {
      $message = 'lo sentimos no se pudo crear usuario';
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php require 'partials/header.php'?>

    <?php if(!empty($message)):?>
      <p> <?= $message?></p> 
    <?php endif; ?>

    <h1>Registrarse</h1>
    <span>o <a href="login.php">Iniciar sesion</a></span>

    <form action="registrarse.php" method="POST">
    <input name="email"type="text" placeholder="ingrese su email">
    <input name="password"type="password"  placeholder="ingrese contraseña">
    <input type="password" name="confirmar_contraceña" placeholder="confirmar contraseña">
    <input type="submit" value="enviar">
    </form>

</body>
</html>