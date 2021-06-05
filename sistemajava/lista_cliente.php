<?php
        include "../database.php";
 ?>


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
                        <?php 
                                $sql = "SELECT u.idp,u.nombre,u.edad,.u.CI,u.tel FROM pasiente u";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                if($result>0){



                                        while ( $data= $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                        <tr>
                                                <td><?php echo $data["idp"];?></td>
                                                <td><?php echo $data["nombre"];?></td>
                                                <td><?php echo $data["edad"];?></td>
                                                <td><?php echo $data["CI"];?></td>
                                                <td>
                                                        <a class="link_edit" href="#">Editar</a>
                                                        |
                                                        <a class="link_elim" href="#">Eliminar</a>

                                                </td>
                                        </tr>

                        <?php
                                        }

                                }
                      

                         ?>


        </table>
	</section>
	
</body>
</html>
