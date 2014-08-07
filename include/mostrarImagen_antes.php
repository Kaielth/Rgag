<?php
//Datos de MySQL
//include("params.php");
$categoria="topic";

$mysql_host="localhost";
$mysql_user="root";
$mysql_password="";
$mysql_database="rgagdb";
//Conexión
$con = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");
//Query
if($categoria=="fresh"){
	$query = "SELECT 
	imagen_id,imagen_titulo,imagen_nombre, imagen_seccion, imagen_voto_negativo,
	imagen_voto_positivo, imagen_fecha_moderada, imagen_impresion,imagen_estado
	 FROM imagen ORDER BY imagen_fecha_moderada DESC";
}else if($categoria=="top"){
	$query = "SELECT 
	imagen_id,imagen_titulo,imagen_nombre, imagen_seccion, imagen_voto_negativo,
	imagen_voto_positivo, imagen_fecha_moderada, imagen_impresion,imagen_estado
	FROM imagen ORDER BY imagen_voto_positivo DESC";
}else{
	$query = "SELECT 
	imagen_id,imagen_titulo,imagen_nombre, imagen_seccion, imagen_voto_negativo,
	imagen_voto_positivo, imagen_fecha_moderada, imagen_impresion,imagen_estado
	FROM imagen";
}

//Ejecutamos query
$result = $con->query($query);
$i=0;
$num_rows = $result->num_rows;

  if($num_rows >= 1){
      echo '<script>';
      echo 'var imagenes = [';      
      while($i < $num_rows && $i < 20){
      	$row = $result->fetch_object();
		
		//if($row->imagen_estado=="APROBADA"&&($row->imagen_seccion==$categoria)){
			      
			  echo '["'.$row->imagen_id.'"';
		      echo ',"'.$row->imagen_titulo.'"';
			  echo ',"'.$row->imagen_nombre.'"';
			  echo ',"'.$row->imagen_seccion.'"';
			  echo ',"'.$row->imagen_voto_negativo.'"';
			  echo ',"'.$row->imagen_voto_positivo.'"';
			  echo ',"'.$row->imagen_fecha_moderada.'"';
			  echo ',"'.$row->imagen_impresion.'"],';
		  	
		  	
		/*}else if($row->imagen_estado=="APROBADA"&&($categoria=='fresh'||$categoria=='top')){

			  echo '["'.$row->imagen_id.'"';
		      echo ',"'.$row->imagen_titulo.'"';
			  echo ',"'.$row->imagen_nombre.'"';
			  echo ',"'.$row->imagen_seccion.'"';
			  echo ',"'.$row->imagen_voto_negativo.'"';
			  echo ',"'.$row->imagen_voto_positivo.'"';
			  echo ',"'.$row->imagen_fecha_moderada.'"';
			  echo ',"'.$row->imagen_impresion.'"],';		  	
		  	
		}*/
		$i++;
         
      }
      		  echo '[""';
		      echo ',""';
			  echo ',""';
			  echo ',""';
			  echo ',""';
			  echo ',""';
			  echo ',""';
			  echo ',""';
			  echo ',""]';
      echo '];'; 
      echo 'alert("hola"+imagenes[0][0]);</script>';      
   }
  
?>



<script>


</script>

<script>

function poca(){

var caja_imagen = document.createElement("div");
caja_imagen.setAttribute('name','caja_imagen');
caja_imagen.setAttribute('id','caja_imagen');

document.body.appendChild(caja_imagen);

var caja = document.getElementById("caja_imagen");
caja.innerHTML = imagenes[1][1];

var imagen = document.createElement("img");
imagen.setAttribute('name','imagen');
imagen.setAttribute('src','posts/');



}


</script>

<input type="button" onclick="poca();">