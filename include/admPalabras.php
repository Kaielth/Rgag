<?php
include("params.php");
		$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//$date_start = $_post['date_start'];
//$date_finish = $_post['date_finish'];
if(isset($_post['date_start']) && isset($_post['date_finish'])){
	$resultado = $conexion->query("SELECT COUNT(imagen_titulo) FROM imagen WHERE imagen_fecha_subida>='".$date_start.
		"' AND imagen_fecha_subida<='".$date_finish."' GROUP BY imagen_titulo ORDER BY imagen_titulo DESC LIMIT 0, 10");
}else{
	$resultado = $conexion->query("SELECT imagen_titulo,COUNT(imagen_titulo) AS repeticiones FROM imagen GROUP BY imagen_titulo ORDER BY imagen_titulo DESC LIMIT 0, 10");
}

$i=0;
$num_rows = $resultado->num_rows;
echo "<h2>Palabras</h2>";
 if($num_rows >= 1){
     echo "<table>";
     echo "<tr>";
      echo "<td><h3>Titulo</h3></td>";
      echo "<td><h3>Repeticiones</h3></td>";
     echo "</tr>";
     while($i < $num_rows){
     	$row = $resultado->fetch_object();
      echo "<tr>";
        echo "<td>".$row->imagen_titulo."</td>";
        echo "<td>".$row->repeticiones."</td>";
      echo "</tr>";
	  	$i++;
      }
      echo "</table>";
   }
?>