<?php 
//Datos de MySQL
$_GET['display'] = "asawd";
include("conectarwol.php");
//Limite de fechas
$date_start = "10";
$date_finish = "12";
//Conexión
$con = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Query
if(isset($_POST["mas_votadas"])){
  	$query = "SELECT 
  	imagen_id,imagen_nombre,imagen_seccion,imagen_impresion,imagen_voto_negativo,imagen_voto_positivo, imagen_fecha_subida
  	FROM imagen ORDER BY imagen_voto_positivo DESC";
}else if(isset($_POST["mas_vistas"])){
  	$query = "SELECT 
  	imagen_id,imagen_nombre,imagen_seccion,imagen_impresion,imagen_voto_negativo,imagen_voto_positivo, imagen_fecha_subida
  	FROM imagen ORDER BY imagen_impresion DESC";
}else{
	  	$query = "SELECT 
  	imagen_id,imagen_nombre,imagen_seccion,imagen_impresion,imagen_voto_negativo,imagen_voto_positivo, imagen_fecha_subida
  	FROM imagen";
}
  

//Ejecutamos query
//$result = mysqli_query($conexion,$query);
$result = mysqli_query($con,$query);
//var_dump($result);
$i=0;
$num_rows = $result->num_rows;
  echo "<h2>Imagenes</h2>";
if($num_rows >= 1){
  echo "<table>";
  echo "<tr>";
    echo "<td><h3>ID</h3></td>";
    echo "<td><h3>Nombre</h3></td>";
    echo "<td><h3>Sección</h3></td>";
    //echo "<td><h3>Impresiones</h3></td>";
    echo "<td><h3>Votos negativos</h3></td>";
    echo "<td><h3>Votos positivos</h3></td>";    
    echo "<td><h3>Fecha de subida</h3></td>";
  echo "</tr>";
  while($i < $num_rows){
    $row = $result->fetch_object();
    echo "<tr>";
      echo "<td>".$row->imagen_id."</td>";
      echo "<td>".$row->imagen_nombre."</td>";
      echo "<td>".$row->imagen_seccion."</td>";
      //echo "<td>".$row->imagen_impresion."</td>";
      echo "<td>".$row->imagen_voto_negativo."</td>";
      echo "<td>".$row->imagen_voto_positivo."</td>";
      echo "<td>".$row->imagen_fecha_subida."</td>";
    echo "</tr>";
    $i++;
  }
  echo "</table>";
}
/* WHERE DATEDIFF(dd, imagen_fecha_subida,\"".$date_start."\") >= 0 AND DATEDIFF(dd, imagen_fecha_subida,\"".$date_finish."\") <= 0 */
?>