<?php
//Datos de MySQL
$_GET['display'] = "asdf";//Evitamos que conectar imprima
include("conectarwol.php");
if($rol_confirmed == "ADMINISTRADOR")
	return;
//Parametros
include("params.php");
//Variables
$categoria = $_POST["categoria"];
//Conexión
$con = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Query
//Condicional, en caso de recibir la variable del id especifica, hara el query a dicha imagen
if(isset($_POST['imagen_id'])){
	$query = "SELECT imagen_seccion FROM imagen WHERE imagen_id=".$_POST['imagen_id'];
	$resultado = $con->query($query);
	$row = $resultado->fetch_object();
	$categoria = $row->imagen_seccion;
	$query = "SELECT 
	imagen_id,imagen_titulo,imagen_nombre,imagen_seccion, imagen_voto_negativo,
	imagen_voto_positivo, imagen_fecha_subida, imagen_impresion,imagen_estado
	FROM imagen WHERE imagen_estado='APROBADA' AND imagen_seccion=\"".$categoria."\"";
	$query = $query." AND imagen_id=".$_POST['imagen_id'];
}else if($categoria=="fresh"){
	$query = "SELECT 
	imagen_id,imagen_titulo,imagen_nombre, imagen_seccion, imagen_voto_negativo,
	imagen_voto_positivo, imagen_fecha_subida, imagen_impresion,imagen_estado
	 FROM imagen WHERE imagen_estado='APROBADA' ORDER BY imagen_fecha_subida DESC";
}else if($categoria=="top"){
	$query = "SELECT 
	imagen_id,imagen_titulo,imagen_nombre, imagen_seccion, imagen_voto_negativo,
	imagen_voto_positivo, imagen_fecha_subida, imagen_impresion,imagen_estado
	FROM imagen WHERE imagen_estado='APROBADA' ORDER BY imagen_voto_positivo DESC";
}else{
	$query = "SELECT 
	imagen_id,imagen_titulo,imagen_nombre, imagen_seccion, imagen_voto_negativo,
	imagen_voto_positivo, imagen_fecha_subida, imagen_impresion,imagen_estado
	FROM imagen WHERE imagen_estado='APROBADA' AND imagen_seccion=\"".$categoria."\"";
}

//Ejecutamos query
//$result = mysqli_query($conexion,$query);
$result = mysqli_query($con,$query);
$i=0;
$x = $_POST['n_posts'];
$num_rows = $result->num_rows;

 if($num_rows >= 1){
     while($i < $num_rows && $i<$x){
     	$row = $result->fetch_object();
      		
			echo "<a class='comentarios' href='#' onclick='comentarios(event,".$row->imagen_id.");' >";
      		echo "<label id='titulo'>".$row->imagen_titulo."</label></a></br>";
     		echo "<label id='fecha'>".$row->imagen_fecha_subida."</label></br>";
     		echo "<a class='comentarios' href='#' onclick='comentarios(event,".$row->imagen_id.");' >
     		<img width='100%' src='posts/".$row->imagen_seccion."/".$row->imagen_nombre."'></a></br>";
     		echo "<input id='positivo' class='imagen' type='submit' onclick='votar(event,1,".$row->imagen_id.");' value='+".$row->imagen_voto_positivo."'/>";
     		echo "<input id='negativo' class='imagen' type='submit' onclick='votar(event,-1,".$row->imagen_id.");' value='-".$row->imagen_voto_negativo."'/>";
			if($rol_confirmed == "MODOP" or $rol_confirmed == "WEBMASTER")
				echo "<input id='borrar' class='imagen' type='submit' onclick='borrar_imagen(event,".$row->imagen_id.");' value='Borrar'/>";
     		echo "</br></br><hr>";

     		//Siguiente renglón
      	    $i++;
     	}
    }
?>