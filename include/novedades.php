<?php
//Datos de MySQL
$_GET['display'] = "asdf";//Evitamos que conectar imprima
include("params.php");
$conexion = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Query
$query = "SELECT usuario_nombre,comentario_comentari FROM usuario,comentario WHERE comentario_usuario_id=usuario_id ORDER BY comentario_fecha DESC Limit 3";
$resultado = $conexion->query($query);
echo "<h2>Ultimos comentarios de la comunidad</h2></br></br>";
while($row = $resultado->fetch_object()){
	echo "<b>".$row->usuario_nombre."</b></br>";
	echo $row->comentario_comentari."</br></br>";
}

?>