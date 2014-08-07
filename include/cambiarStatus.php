<?php
//Conexión
include("params.php");
$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Recuperamos variables
$usuario_status = $_POST['usuario_status'];
$nombre_usuario = $_POST['nombre_usuario'];
//Consulta
$query="UPDATE usuario SET usuario.usuario_status='$usuario_status' WHERE usuario_nombre='$nombre_usuario'";
$conexion->query($query);
?>