<?php
	include("params.php");
	$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
	$comentario_id = $_POST["comentario_id"];
	echo $comentario_id;
	$conexion->query("DELETE FROM comentario WHERE comentario_id=".$comentario_id);	
?>