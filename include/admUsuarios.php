<?php 
//Datos de MySQL
$_GET['display'] = "asd";
include("conectarwol.php");
//"USUARIO","MODERADOR",",MODOP","WEBMASTER"

//$mysql_host="localhost";
//$mysql_user="root";
//$mysql_password="";
//$mysql_database="rgagdb";
//Conexión
//$con = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Query
  	$query = "SELECT 
  	usuario_id,usuario_nombre,max(log_usuario_fecha) as log_usuario_fecha, count(*) as logins
  	FROM usuario,log_usuario WHERE usuario_id = log_usuario_usuario_id GROUP BY log_usuario_usuario_id ORDER BY max(log_usuario_fecha) DESC"; 
//Ejecutamos query
$result = mysqli_query($conexion,$query);
//$result = mysqli_query($con,$query);
//var_dump($result);

$i=0;
$num_rows = $result->num_rows;
echo "<h2>Usuarios</h2>";
 if($num_rows >= 1){
     echo "<table>";
     echo "<tr>";
      echo "<td><h3>ID</h3></td>";
      echo "<td><h3>Nombre</h3></td>";
      echo "<td><h3>Fecha del log</h3></td>";
      echo "<td><h3>Logins</h3></td>";
     echo "</tr>";
     while($i < $num_rows){
     	$row = $result->fetch_object();
      echo "<tr>";
        echo "<td>".$row->usuario_id."</td>";
        echo "<td>".$row->usuario_nombre."</td>";
        echo "<td>".$row->log_usuario_fecha."</td>";
        echo "<td>".$row->logins."</td>";
      echo "</tr>";
	  	$i++;
      }
      echo "</table>";
   }
?>