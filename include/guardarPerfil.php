<?php
include();
$conexion = mysqli_connect("localhost","rgagdb","rgagdb123##","rgagbd"); 
if (!$con)
  {
  die('Imposible conectarse, intentalo más tarde');
  }

mysql_select_db("rgagbd", $con);

$nombre_usuario = $_POST['nombre_usuario'];
$password = $_POST['password'];
$edad = $_POST['edad'];
$correo = $_POST['correo']

$sql="UPDATE usuario SET usuario_nombre = '"$nombre_usuario"', usuario_password = '"$password"', usuario_correo = '"$correo"',usuario_edad = '"$edad"' WHERE nombre_usuario='"$nombre_usuario"'";
;

if (!mysql_query($sql,$con))
  {
  die('FRACASO ' . mysql_error());
  }

echo "EXITO";

mysql_close($con)

?>