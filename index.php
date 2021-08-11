<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Galería de Productos</title>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/arrow.css" />
</head>

<body>
	<header>
		<h1>GALERÍA DE PRODUCTOS</h1>
		<hr>
	</header>
	<section id="products">
		<ul class="gallery">
			<?php
			include_once("php/config_productos.php");
			include_once("php/db.php");
			$conn=new db();
			$sql = "select zapatillas.id_zapatilla as id, zapatillas.imagen as imagen,marcas.descripcion as descripcion,zapatillas.modelo as modelo, zapatillas.precio as precio,date_format(zapatillas.fecha_alta,'%d/%m/%Y') as fecha from zapatillas,marcas
			where zapatillas.id_marca=marcas.id_marca";
		
			$result=$conn->query($sql);

			while ($row = $result->fetch_assoc()) {
			?>
				<li>
					<div class="box">
						<figure><img src="<?php echo $row['imagen'] ?>">
							<figcaption>
								<h3>Zapatillas <?php echo $row['descripcion'] . " " . $row['modelo'] ?> </h3>
								<p><?php echo "$" . " " . $row['precio'] ?></p>
								<time><?php echo $row['fecha'] ?></time>
								<?php
								$sqlColours = "select m.descripcion as descripcion, z.modelo as modelo, z.precio as precio, z.imagen as imagen, z.fecha_alta as fecha,c.descripcion as color
								 from zapatillas z,marcas m, colores_zapatillas cz,colores c where z.id_marca=m.id_marca and z.id_zapatilla=cz.id_zapatilla and c.id_color=cz.id_color and z.id_zapatilla=" . $row['id'];
								
								$resultColours=$conn->query($sqlColours);
								$textColours = "Colores: ";
								while ($rowColours = $resultColours->fetch_assoc()) {
									$textColours = $textColours . " " . $rowColours['color'];
								}
								?>
								<span><?php echo $textColours ?></span>
							</figcaption>
						</figure>
					</div>
				</li>
			<?php
			}
			?>
		</ul>
	</section>
	<footer>
		<hr>
		<h3 id="footer-text">Copyright 2021 | Todos los derechos reservados </h3>
		<div style="text-align:center">
			<a href="login.html"> Area Privada</a>
		</div>
	</footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<div class="arrow"><a href="#" id="toTop"><img src="images/backToTop.png" alt="" /><img src="images/backToTop.png"" alt="" class=" top" /></a></div>
	<script src="js/arrow.js"></script>

</body>

</html>