<?php
//Datos de conexión
include("params.php");
//Conexión
$conexion = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Recuperamos datos
$nombre_usuario = $_POST['nombre_usuario'];
$password = $_POST['password'];
$edad = $_POST['edad'];
$correo = $_POST['correo'];
//Creamos y ejecutamos la consulta
$query="INSERT INTO usuario (usuario_nombre, usuario_password, usuario_correo, usuario_edad, usuario_status) VALUES ('$nombre_usuario','".sha1($password)."','$correo',$edad,'INACTIVO')";;
$conexion->query($query);
//Correo
//mail($correo,'Rgag','Bienvenido',"Rgag");
//header("Location: index.php?correo=$correo&codact=$codigo_para_activar"); 
?>