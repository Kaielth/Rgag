<?php 

echo "<input type='text' placeholder='usuario' id='nombre_usuario' name='nombre_usuario'>" 
echo "<input type='password' placeholder='Contraseña' id='password' name='password'>"
echo "<input type='text' placeholder='edad' id='edad' name='edad'>"
echo "<input type='text' placeholder='correo' id='correo' name='correo'>"
echo "<button onclick='guardar_perfil()'>Guardar</button>"
 
 include 'conectar.php';




$conexion = mysqli_connect("localhost","rgagdb","rgagdb123##","rgagbd"); 
if (!$con)
  {
  die('Imposible conectarse, intentalo más tarde');
  }

mysql_select_db("rgagbd", $con);

$sql="Select * from comentario order by comentario_id DESC LIMIT 5  Where comentario_usuario_id = '"$nombre_usuario_confirmed"'";
;
$sql2="Select * from voto order by voto_id DESC LIMIT 5  Where voto_usuario_id = '"$nombre_usuario_confirmed"'";
;
if (!mysql_query($sql,$con))
  {
  die('FRACASO ' . mysql_error());
  }


while ($fila = mysql_fetch_array($sql2)) {

    echo "<a href='#'' onclic='verImagen('"$fila['comentario_imagen_id']"');'>'"$fila['comentario_comentario']"'</a>"
}


if (!mysql_query($sql2,$con))
  {
  die('FRACASO ' . mysql_error());
  }
  echo "";

while ($fila = mysql_fetch_array($sql2)) {

    echo "<a href='#'' onclic='verImagen('"$fila['voto_imagen_id']"');'>Contenido del comentario</a>"
}
mysql_close($con)

 ?>






 