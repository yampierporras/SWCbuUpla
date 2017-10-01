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
				<section class="central-arriba">
					<button id="btn-agregarMiembro">
						<a href="http://localhost:8070/frontend/vistas/regMiembros.php">Agregar miembro</a>
					</button>
				</section> <!-- botones -->
				<section class="central-abajo">
					<h1 class="titulo">MIEMBROS</h1>
					<table class="tabla-datos">
						<tr>
							<th>Id</th>
							<th>Miembro</th>
							<th>Edad</th>
							<th>Genero</th>
							<th>Editar</th>
						</tr>
						<?php 
						$enlace = new mysqli('localhost', 'root', '', 'cbuDB');
						if (!$enlace->connect_error) {
							

							$consulta = "SELECT * FROM miembro";
							$query = $enlace->prepare($consulta);
							$query->execute();
							$query->store_result();
							$query->bind_result($id, $nombre, $apellidos, $edad, $genero, $telefono, $correo);

							// [ [] [ghampier,porras,24,m,...] [] [] [] [] [] [] [] ...     ]
							//   -1  0 					1  2  3  4 5
							
							// while ($query->fetch()) {
							// 	echo '<tr>';
							// 	echo '<td>'.$id.'</td>';
							// 	echo '<td>'.$nombre.' '.$apellidos.'</td>';
							// 	echo '<td>'.$edad.'</td>';
							// 	echo '<td>'.$genero.'</td>';
							// 	echo '<td>lapiz</td>';
							// 	echo '</tr>';
							// }

						} else {
						 	echo 'no pude';
						}
						
						?>
						<?php while ($query->fetch()): ?>
							<tr>
								<td><?php echo  $id; ?></td>
								<td><?php echo  $nombre.' '.$apellidos; ?></td>
								<td><?php echo  $edad ;?></td>
								<td><?php echo  $genero ;?></td>
								<td>lapiz</td>
							</tr>
						<?php endwhile ?>
						
					</table>
				</section> <!-- tabla -->
			</article>
		</main> <!-- contenido principal -->
	</body>
</html>
