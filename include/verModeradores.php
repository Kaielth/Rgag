<?php 
//Datos de usuario y conexión
$_GET["display"] = "sfaf";
include("conectarwol.php");
//Conexión
$conexion = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Query
$query = "SELECT usuario_id,usuario_nombre,usuario_rol FROM usuario ORDER BY usuario_fecha_registro ASC";
//Ejecutamos query
$resultado = $conexion->query($query);
$i=0;
$num_rows = $resultado->num_rows;
if($num_rows >= 1){     
  echo "<table id='tabla'>";
  while($i < $num_rows){
    $row = $resultado->fetch_object();
    echo "<tr>";
      echo "<td>".$row->usuario_id."</td>";
      echo "<td>".$row->usuario_nombre."</td>";
      echo "<td>ROL:".$row->usuario_rol."</td>";
      echo "<td><input id='mod' type='submit' value='Convertir a MOD' onclick='crear_moderador(event,1,".$row->usuario_id.");'></td>";
      if($rol_confirmed == "WEBMASTER"){
        echo "<td><input id='mod' type='submit' value='Convertir a MODOP' onclick='crear_moderador(event,2,".$row->usuario_id.");'></td>";
        echo "<td><input id='mod' type='submit' value='Convertir a Usuario' onclick='crear_moderador(event,0,".$row->usuario_id.");'></td>";
      }
    echo "</tr>";
    $i++;
  }      
}
echo "</table>";

?>