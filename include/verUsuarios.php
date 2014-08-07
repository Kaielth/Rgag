<?php 
$_GET["display"] = "sfaf";
include("conectarwol.php");

//Conexión
$conexion = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Query
$query = "SELECT usuario_id,usuario_nombre FROM usuario ORDER BY usuario_fecha_registro ASC";
//Ejecutamos query
$resultado = $conexion->query($query);

$i=0;
$num_rows = $resultado->num_rows;

if($num_rows >= 1){     
	echo "<table id='tabla'>";
	while($i < $num_rows){
		$row = $resultado->fetch_object();
		echo "<tr>";
			echo "<td><a href='#' onclick='ver_usuario(event,".'"'.$row->usuario_nombre.'"'.");'>".$row->usuario_id."</a></td>";
			echo "<td><a href='#' onclick='ver_usuario(event,".'"'.$row->usuario_nombre.'"'.");'>".$row->usuario_nombre."</a></td>";
		echo "</tr>";
		$i++;
	}      
}
echo "</table>";

?>