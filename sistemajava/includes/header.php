<?php
session_start();

 
    if(empty($_SESSION['active']))//si no existe variable sesion
    {
      header('location: ../');//redireccionar a
    }
?>

<header>
		<div class="header">
			
			<h1>Sistema Odontologia</h1>
			<div class="optionsBar">
				<p>Bolivia, 20 mayo de 2021</p>
				<span>|</span>
				<span class="user">JOSAM PINAYA</span>
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="logout.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
        <?php include "includes/nav.php"?>
</header>