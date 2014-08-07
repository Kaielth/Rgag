<?php
//Parametros de mysql
include ('conectarwol.php');
//Conexion
$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Recuperamos las variables
$imagen_id = $_POST['imagen_id'];
$nombre_usuario = $nombre_usuario_confirmed;
$voto_valor = $_POST['voto_valor'];
//Consulta
//Id del usuario
$query = "select usuario_id from usuario where usuario_nombre = '$nombre_usuario'";
$resultado = $conexion->query($query);
$row = $resultado->fetch_object();
$usuario_id = $row->usuario_id;
//Tabla de votos
$query = "INSERT INTO voto (voto_imagen_id, voto_usuario_id, voto_valor, voto_fecha) VALUES ('$imagen_id',$usuario_id,'$voto_valor',NOW())";
$conexion->query($query);
//Voto de imagen
if($voto_valor == "1")
	$query = "UPDATE imagen SET imagen_voto_positivo = imagen_voto_positivo + 1 WHERE imagen_id=$imagen_id";
else
	$query = "UPDATE imagen SET imagen_voto_negativo = imagen_voto_negativo + 1 WHERE imagen_id=$imagen_id";
$conexion->query($query);
?>