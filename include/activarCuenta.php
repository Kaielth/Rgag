<?php
$conexion = mysqli_connect("localhost","rgagdb","rgagdb123##","rgagbd"); 
$codigo_para_activar = _post["codigo_para_activar"];
$usuario_nombre = _post["usuario_nombre"];
$result = mysqli_query($conexion,"SELECT usuario_codigo_activacion FROM usuario WHERE usuario_nombre = ".$usuario_nombre."");
while ($row = mysqli_fetch_array($result)) {
	if($codigo_para_activar = $row['usuario_codigo_activacion']){
		mysqli_query($conexion,"UPDATE usuario SET usuario_codigo_activacion='0000000000000000000000000000000000000000', usuario_status='ACTIVO'
		WHERE usuario_codigo_activacion =".$codigo_para_activar."");
		echo "EXITO";
	}else{
		echo "FALLO";
	}
}

