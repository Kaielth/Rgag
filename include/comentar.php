<?php
//Datos de conexión sin impresiones
$_GET['display'] = "aaf";
include("conectarwol.php");
//Recuperamos variables
$comentario = $_POST['contenido_comentario'];
$imagen_id = $_POST['imagen_id'];
$nombre_usuario = $_POST['nombre_usuario'];
//Creamos la conexión
$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
$query = "Select usuario_id from usuario where usuario_nombre='$nombre_usuario'";
$resultado = $conexion->query($query);
$row = $resultado->fetch_object();
$usuario_id = $row->usuario_id;
//Creamos y ejecutamos el query
$query="INSERT INTO comentario (comentario_imagen_id,comentario_usuario_id,comentario_comentari) VALUES ($imagen_id,$usuario_id,'$comentario')";
$conexion->query($query);
echo $query;
?>