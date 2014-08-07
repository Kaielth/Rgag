<?php
	//Cualquier impresión se hara solo si no existe la variable $_GET['display']
	//Variables de confirmación
	$nombre_usuario_confirmed = "VISITANTE";
	$rol_confirmed = "VISITANTE";
	if(!isset($_SESSION)) 
	{ 
		session_start();
	}
	//Verificamos con las variables recibidas
	if(isset($_POST['nombre_usuario']) && isset($_POST['password'])){
		//Sí recibimos las variables de inicio de sesión, el usuario intentara conectarse
		//Las variables existen, verificamos que coincidan con la bd y el usuario este activo
		include("params.php");
		$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
		$query = "SELECT * FROM usuario WHERE ".
				"usuario_nombre='".$_POST['nombre_usuario']."' AND ".
				"usuario_password='".sha1($_POST['password'])."' AND ".
				"usuario_status='ACTIVO'";
		//Sí coinciden, todo bien
		$resultado = $conexion->query($query);
		if($resultado->num_rows > 0){
			//Guardamos los datos en variables de sesión
			$row = $resultado->fetch_object();			
			$_SESSION['nombre_usuario'] = $row->usuario_nombre;
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['rol'] = $row->usuario_rol;
			//Guardamos las variables de confirmación
			$nombre_usuario_confirmed = $row->usuario_nombre;
			$rol_confirmed = $row->usuario_rol;
			//Mostramos el usuario y la opción de registrarse
			if(!isset($_GET['display']))
				echo "
				<div id ='logeado'>
				<a id='user' href='#' onclick='ver_perfil(event);'>".$_SESSION['nombre_usuario']."</a>".
					"  <a id='disconnected' href='#' onclick='desconectarse(event);'>DESCONECTARSE</a><br></div>";
			//Creamos un registro en la tabla log
			include("params.php");
			$conexion = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
			$query = "INSERT INTO log_usuario(log_usuario_usuario_id,log_usuario_fecha) VALUES(".$row->usuario_id.",NOW());";
			$conexion->query($query);
		}else{
			if(!isset($_GET['display']))
				echo "Usuario inexistente";
			log_form();
		}
	}else
	//Verificamos las variables de sesión
	if(isset($_SESSION['nombre_usuario']) &&
		isset($_SESSION['password']) &&
		isset($_SESSION['rol'])){		
		//Las variables existen, verificamos que coincidan con la bd
		include("params.php");
		$conexion = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
		$query = "SELECT * FROM usuario WHERE ".
				"usuario_nombre='".$_SESSION['nombre_usuario']."' AND ".
				"usuario_password='".sha1($_SESSION['password'])."' AND ".
				"usuario_status='ACTIVO'";
		//Sí coinciden, todo bien
		$resultado = $conexion->query($query);
		if($resultado->num_rows > 0){
			//Guardamos los datos en variables de sesión
			$row = $resultado->fetch_object();			
			$_SESSION['nombre_usuario'] = $row->usuario_nombre;
			$_SESSION['rol'] = $row->usuario_rol;
			//Guardamos las variables de confirmación
			$nombre_usuario_confirmed = $row->usuario_nombre;
			$rol_confirmed = $row->usuario_rol;
			//Mostramos el usuario y la opción de registrarse
			if(!isset($_GET['display']))
				echo "
			<div id ='logeado'>
			<a id='user' href='#' onclick='ver_perfil(event);'>".$_SESSION['nombre_usuario']."</a>".
					"  <a id='disconnected' href='#' onclick='desconectarse(event);'>DESCONECTARSE</a><br></div>";
			//Creamos un registro en la tabla log
			include("params.php");
			$conexion = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
			$query = "INSERT INTO log_usuario(log_usuario_usuario_id,log_usuario_fecha) VALUES(".$row->usuario_id.",NOW());";
			$conexion->query($query);
		}else{
			if(!isset($_GET['display']))
				echo "Usuario inexistente";
			log_form();
		}
	}else{//No recibio nada ni hay datos previos
			log_form();
	}
	function log_form(){
		if(!isset($_GET['display']))
			echo '
			<form id = "log" action="index.php" method="post">
				<table>
				<tr>
					<td><label>Nombre: </label></td>
					<td><input type="text" name="nombre_usuario"></td>
				</tr>
				<tr>
					<td><label>Password:</label></td>
					<td><input type="password" name="password"></td>
			    </tr>
				</table>
				<input type="submit" value="Conectarse" onclick="conectar();">	<br>
				<input id= "reg" type="button" value="Registrarse" onclick="registrarse(event);">
			</form>';
	}
	if(!isset($_GET['display']))
		echo "</br>";
?>