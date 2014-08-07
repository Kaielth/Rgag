<?php
//Varfiables para mysql y conexión
include("params.php");
$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Recuperamos variables
$nombre_usuario = $_POST['nombre_usuario'];
//Query
$query = "UPDATE usuario SET usuario.usuario_status='ELIMINADO' WHERE usuario_nombre='$nombre_usuario'";
$conexion->query($query);
echo $query;
?>