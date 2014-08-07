<?php
//Imprimimos una sola imagen
$_POST['n_posts'] = 1;
$imagen_id = $_POST['imagen_id'];
include("mostrarImagen.php");
//Verificamos el rol del usuario
include("conectar.php");
if($rol_confirmed != "VISITANTE"){
	echo "<textarea id='comentario_nuevo'></textarea> </br>";
	echo "<input type='submit' value='Agregar comentario' onclick='comentar(event,".('"'.$nombre_usuario_confirmed.'"').");'/>";
	echo "<div id='imagen_id'>$imagen_id</div>";
}
//Creamos la conexion
include("params.php");
$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
$query = "SELECT usuario_nombre,comentario_usuario_id,comentario_comentari,comentario_id,comentario_fecha FROM usuario,comentario WHERE comentario_imagen_id=".$imagen_id." AND usuario_nombre='$nombre_usuario_confirmed'";
//Ejecutamos la consulta
$resultado = $conexion->query($query);
//Imprimimos los comentarios, si los hay
if($resultado->num_rows > 0){
	for($j = 0; $j < ($resultado->num_rows); $j++){
		$row = $resultado->fetch_object();
		echo "<h3 title='usuario'>".$row->usuario_nombre."</h3></br>";
		echo "<p>".$row->comentario_comentari."</p></br>";
		echo "<p id='id_comentario'>".$row->comentario_id."</p>";
		echo "<p id='fecha_comentario'>".$row->comentario_fecha."</p>";
		//Si el usuario es MODERADOR OP o WEBMASTER
		if($rol_confirmed == "MODOP" or $rol_confirmed == "WEBMASTER"){
			echo "<input type='submit' value='Borrar comentario' onclick='borrar_comentario(event,".$row->comentario_id.");' />";
		}
	}
}
?>