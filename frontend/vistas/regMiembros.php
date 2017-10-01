<!DOCTYPE html>
<html>
	<head>
		<title>Control de miembros</title>
		<link rel="stylesheet" href="../css/miembros.css">
	</head>
	<body>
		<header>
			<div class="logoImagen"><img src="../img/logoCbu.png" alt="logo"></div>
			<div class="logoTitulo"><h1>CBU UPLA</h1></div>
		</header> <!-- encabezado -->
		<main>
			<aside class="lateral">
				<nav class="lateral-menu">
					<ul class="menu-lista">
						<li class="item"><a href="">Menu a</a></li>
						<li class="item"><a href="">Menu b</a></li>
						<li class="item"><a href="">Menu c</a></li>
						<li class="item"><a href="">Menu d</a></li>
					</ul>
				</nav>
			</aside>
			<article class="central">
				<section>
					<h1>Registro de miembros</h1>
					<form action="http://localhost:8070/frontend/vistas/regMiembros.php" method="POST">
						<input type="text" placeholder="Nombres" name="nombres"><br>
						<input type="text" placeholder="Apellidos" name="apellidos"><br>
						<input type="text" placeholder="Edad" name="edad"><br>
						<input type="text" placeholder="Genero" name="genero"><br>

						<input type="submit" value="Registrar">
					</form>
					
					<?php 
					if (isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['edad']) && isset($_POST['genero']))
					{
						$nombres = $_POST['nombres'];
						$apellidos = $_POST['apellidos'];
						$edad = $_POST['edad'];
						$genero = $_POST['genero'];
						echo 'esta ingresando';
						echo $nombres.$apellidos.$edad.$genero;

						$enlace = new mysqli('localhost', 'root', '', 'cbuDB');
						if (!$enlace->connect_error) {
							$consulta = "INSERT INTO miembro VALUES (default, '$nombres', '$apellidos', $edad, '$genero', null, null)";
							$query = $enlace->prepare($consulta);
							$query->execute();

						} else {
						 	echo 'no pude';
						}
					}
					 ?>
					<!-- INSERT INTO miembro VALUES (default, 'Ghampier Hector', 'Porras Gago', 24, 'M', null, 'yampierporras@gmail.com') -->
				</section>
			</article>
		</main> <!-- contenido principal -->
	</body>
</html>
