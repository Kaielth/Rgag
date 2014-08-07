<?php
$conexion = mysqli_connect("localhost","rgagdb","rgagdb123##","rgagbd"); 
	mysql_query($conexion, "SELECT COUNT(*) AS cnt FROM imagen WHERE imagen_estado='ACEPTADA'");
	$numero = $row['cnt'];
	$numero = rand(1, $numero);
	$resultado = mysql_query($conexion, "SELECT * FROM imagen WHERE imagen_estado='ACEPTADA'");
	while($row = mysqli_fetch_array($result && $numero > 0){
		$numero = $numero - 1;
	}
	echo "<img src='post/'" . $row["imagen_tipo"] . "/" . $row["imagen_nombre"]. "' onclick='comentarios(event, " . $row["imagen_id"] . ")'/>";