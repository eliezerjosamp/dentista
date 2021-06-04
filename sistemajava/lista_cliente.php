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
		<h1>LISTA DE CLIENTES</h1>
		<a href="registro_cliente.php" class='btn_new'>Registrar Pasiente</a>
        <table>
        	<tr>
        		<th>ID</th>
        		<th>Nombre</th>
        		<th>Edad</th>
        		<th>CI</th>
        		<th>Acciones</th>
        	</tr>
        	<tr>
        		<td>1</td>
        		<td>josam</td>
        		<td>23</td>
        		<td>7351036</td>
        		<td>
        			<a class="link_edit" href="#">Editar</a>|
        			<a class="link_elim" href="#">Eliminar</a>
        		</td>
        	</tr>
        </table>
	</section>
	
</body>
</html>