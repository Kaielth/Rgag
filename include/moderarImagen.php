<?php
/*
ERROR: si no hay imagenes pendientes, truena, GG
Siempre tener alguna imagen para moderar
*/
//Datos de conexión
$_GET['display'] = "sfafsa";
include("conectarwol.php");
$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Query
$query = "SELECT COUNT(*) AS cnt FROM imagen WHERE imagen_estado='PENDIENTE'";
$resultado = $conexion->query($query);
//Desplegamos el formulario
$numero = $resultado->num_rows;
$numero = rand(1, $numero);
$query = "SELECT imagen_id,imagen_seccion,imagen_nombre FROM imagen WHERE imagen_estado='PENDIENTE'";
$resultado = $conexion->query($query);
if($numero > 0 && $row = $resultado->fetch_object()) {	
	$numero = $numero-1;
}
if(!isset($row->imagen_seccion)){
	echo "Ya no hay imagenes para moderar, GG";
	return;
}
echo "<img src='posts/".$row->imagen_seccion."/".$row->imagen_nombre."' /></br>";

echo "<input id='aprobar' type='submit' value='Aprobar' onclick='aprobar(event, ".'"'.$nombre_usuario_confirmed.'"'.",".$row->imagen_id.")'>";
echo "<input id='desaprobar'type='submit' value='Desaprobar' onclick='desaprobar(event, ".'"'.$nombre_usuario_confirmed.'"'.",".$row->imagen_id.")'>";
$query = "SELECT * FROM usuario WHERE usuario_nombre=".$_SESSION['nombre_usuario'];
$resultado = $conexion->query($query);
if($rol_confirmed == "WEBMASTER"){
	echo "<input id='sobornar' type='submit' value='Sobornar' onclick='sobornar(event,".$row->imagen_id.")'><br><hr><br>";
}
?>