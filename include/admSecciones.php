<?php 
//Datos de MySQL
//include("conectar.php");
//"USUARIO","MODERADOR",",MODOP","WEBMASTER"
$rol_confirmed = "MODERADOR";

$mysql_host="localhost";
$mysql_user="root";
$mysql_password="";
$mysql_database="rgagdb";
//Conexión
$con = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Query
  	$query = "SELECT 
    imagen_seccion, sum(imagen_impresion) as total_vistas
    FROM imagen 
    GROUP BY imagen_seccion
    ORDER BY total_vistas DESC"; 
//Ejecutamos query
//$result = mysqli_query($conexion,$query);
$result = mysqli_query($con,$query);
//var_dump($result);

$i=0;
$num_rows = $result->num_rows;
echo "<h2>Secciones más vistas</h2>";
 if($num_rows >= 1){
     echo "<table>";
     echo "<tr>";
      echo "<td><h3>Sección</h3></td>";
      echo "<td><h3>Total de vistas</h3></td>";
     echo "</tr>";
     while($i < $num_rows){
      $row = $result->fetch_object();
      echo "<tr>";
        echo "<td>".$row->imagen_seccion."</td>";
        echo "<td>".$row->total_vistas."</td>";
      echo "</tr>";
      $i++;
      }
      echo "</table>";
   }
?>