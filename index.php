<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="img/boton.png">
	<title>Rgag</title>
	<link rel="stylesheet" href="css/main.css">
	<script src="js/main.js"></script>
	<script src="js/router.js"></script>
</head>
<body>
    <div id="cabecera">
    <div class="dilbert-container">
		<div class="dilbert-background-image">
			<img width="50%"; src="img/boton.png" alt="" class="dilbert-overlay">
		</div>    	
    </div>
    <header><img src="img/logo.png" width="50%" height="50%" alt=""></header>
	<nav id="navegacion">
		<?php include("include/menu.php"); ?>
	</nav>
	</div>
	<div id="central">
	<div id="contenido">
	CONTEIDO
		<script>
			init("topic");
		</script>
	</div>
	<div id="contaux">
		<?php
		include("include/novedades.php");
		?>
	</div>
	</div>
	<footer id="footer">
		
			©2014 Runeo Ltd. All rights reserved.<br>
		
	</footer>
</body>
</html>