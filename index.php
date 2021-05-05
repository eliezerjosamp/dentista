<?php
  session_start();

  require 'database.php';/*acceso a la base de datos*/

  if (isset($_SESSION['user_id'])) {/*si existe variable sesion*/
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');/*selecciona datos */
    $records->bindParam(':id', $_SESSION['user_id']);/*bincular parametros con lo que hay en la sesion*/
    $records->execute();/**/
    $results = $records->fetch(PDO::FETCH_ASSOC);/*obtencion de datos y poner en variable results*/

    $user = null;/*datos nulos al inisiar*/

    if (count($results) > 0) {/*si los resultados no estan vacios*/
      $user = $results;/*llenar variable users con results*/
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a la App</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
</head>
<body>

    <?php require 'partials/header.php'?>

    <?php if(!empty($user)): /*si si no esta vasio la variable*/?>
      <?php header("Location: /Dentista/sistemajava");?>
    <?php else: ?>

    <h1>porfavor registrese</h1>
    <a href="login.php">Iniciar sesion</a> o
    <a href="registrarse.php">Registrarse</a>

	<?php endif;?>
</body>
</html>
