<?php
//Conexión
include("params.php");
$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Recuperamos variables
$imagen_id = $_POST['imagen_id'];
//Query
$query = "UPDATE imagen SET imagen_estado='APROBADA' WHERE imagen_id=$imagen_id";
$conexion->query($query);
?>