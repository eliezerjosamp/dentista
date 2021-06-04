<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"?>
	<title>Sistema Odontologia</title>
</head>
<body>

	<?php include "includes/header.php"?>	
	<section id="container">
		<div class="form_register"> 
			<h1>REGISTRO</h1>
			<hr>
			<div clas="alert"></div>
        	<form>
            	<label for="nombre">Nombre de Paciente</label>
            	<input type="text" name="nombre" placeholder="Nombre comnpleto">
            	<label for="edad">Edad</label>
            	<input type="text" name="edad"  placeholder="Nombre comnpleto">
            	<label for="CI">CI</label>
            	<input type="text" name="CI" placeholder="Nombre comnpleto">

            	<input type="submit" value="Registrar Paciente" class="btn_save">
        </form>
       </div>
	</section>
	
</body>
</html>