<?php
//Conexión
include("params.php");
$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Recuperamos variables
$mod_type = $_POST['mod_type'];
$usuario_id = $_POST['usuario_id'];
//Query
$query = "UPDATE usuario SET usuario_rol='$mod_type' WHERE usuario_id=$usuario_id";
$conexion->query($query);
?>
