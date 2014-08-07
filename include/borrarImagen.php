<?php
//Parametros de mysql
include("params.php");
//Recuperamos variables
$imagen_id = $_POST["imagen_id"];
//Conexión y consulta
$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
$query = "UPDATE imagen SET imagen_estado='DESAPROBADA' WHERE imagen_id =".$imagen_id;
$conexion->query($query);
?>