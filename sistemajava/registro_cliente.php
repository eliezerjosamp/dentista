<?php 
	if (!empty($_POST)) {
		$alert='';
		if (empty($_POST['nombre'])||empty($_POST['edad'])||empty($_POST['CI'])||empty($_POST['tel'])) 
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			include "../database.php";
			$nombre=$_POST['nombre'];
			$edad=$_POST['edad'];
			$CI=$_POST['CI'];
			$tel=$_POST['tel'];

			/*echo "SELECT * FROM pasiente WHERE nombre='$nombre' OR CI='$CI' ";
			$records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email')
			$records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');/*saca datos de base de datos
   			 $message = 'paso 1';7
    			$records->bindParam(':email', $_POST['email']);
   				 $records->execute();
    				$results = $records->fetch(PDO::FETCH_ASSOC)
			*/
			/*$query = mysqli_query($conn,"SELECT * FROM pasiente WHERE nombre='$nombre' OR CI='$CI' ");
			$result = mysqli_fetch_array($query);*/

			$records = $conn->prepare('SELECT * FROM pasiente WHERE nombre=$nombre OR CI=$CI ');
			//$records->execute();
			$result = $records->fetch(PDO::FETCH_ASSOC);	
			if($result>0){
				$alert='<p class="msg_error">EL pasiente YA EXISTE</p>';
			}else{
				//$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
   				// $stmt = $conn->prepare($sql);

				//$query_insert=mysql_query($conn,"INSERT INTO pasiente(nombre,edad,CI,tel) VALUES('$nombre','edad','CI','tel')");
				$sql = "INSERT INTO pasiente (nombre, edad,CI,tel) VALUES ($nombre,$edad,$CI,$tel)";
    			$stmt = $conn->prepare($sql);
    			$stmt->bindParam('$nombre', $_POST['nombre']);
    			$stmt->bindParam('$edad', $_POST['edad']);
    			$stmt->bindParam('$CI', $_POST['CI']);
    			$stmt->bindParam('$tel', $_POST['tel']);
				if($stmt){
					$alert='<p class="msg_save">PASIENTE REGISTRADO CORRECTAMENTE.</p>';
				}else{
					$alert='<p class="msg_error">ERROR ALL CREAR PASIENTE</p>';
				}

			}
		}
	}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>REGISTRO</title>
</head>
<body>
	<?php include "includes/header.php";?>	
	<section id="container">
		<div class="form_register"> 
			<h1>REGISTRO</h1>
			<hr>
			<div clas="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
        	<form action="" method="post">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" placeholder="Nombre comnpleto">
            	<label for="edad">Edad</label>
            	<input type="text" name="edad"  placeholder="Edad del Paciente">
            	<label for="CI">CI</label>
            	<input type="text" name="CI" placeholder="Carnet de Identidad">
            	<label for="tel">Telefono</label>
            	<input type="text" name="tel" placeholder="Telefono o celular">

            	<input type="submit" value="Registrar Paciente" class="btn_save">
        </form>
       </div>
	</section>
	
</body>
</html>