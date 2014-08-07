<?php
include("params.php");
$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Datos
$nombre_usuario = $_POST['nombre_usuario'];
$imagen_id = $_POST['imagen_id'];
$voto_tipo = $_POST['voto_tipo'];
//usuario_id
$query = "SELECT usuario_id FROM usuario WHERE usuario_nombre ='$nombre_usuario'";
$resultado = $conexion->query($query);
$row = $resultado->fetch_object();
$usuario_id = $row->usuario_id;
//Query
$query = "INSERT INTO voto_moderador(voto_moderador_imagen_id, voto_moderador_usuario_id,voto_tipo) VALUES ($imagen_id,$usuario_id,$voto_tipo)";
$resultado = $conexion->query($query);
//Nuevo query
$query = "SELECT voto_tipo FROM voto_moderador WHERE voto_moderador_imagen_id=$imagen_id";
$resultado = $conexion->query($query);
$num_rows = $resultado->num_rows;

$desaprobada = 0;
$aprobada = 0;
if($num_rows >= 1){
 	$i = 0;
 	while(($i < $num_rows)||$aprobada==3||$desaprobada==3){
 		$row = $resultado->fetch_object();
 		$voto = $row->voto_tipo;
 		if($voto=="DESAPROBADA"){
 			$desaprobada++;
 		}else{
 			$aprobada++;
 		}
 		$i++;
 	}
    if($desaprobada>=3){
		$query = "UPDATE imagen	SET imagen_estado= 'DESAPROBADA' WHERE imagen_id='$imagen_id'";
		$conexion->query($query);
	}else if($aprobada>=3){
		$query = "UPDATE imagen	SET imagen_estado= 'APROBADA' WHERE imagen_id=$imagen_id";
		$conexion->query($query);
	}
}
?>