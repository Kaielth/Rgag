<?php
//Datos Mysql
//include("conectar.php");
//Mysql INSERT
include("params.php");
//Conexión
$con = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die ("Imposible conectarse, intentalo más tarde");

//Datos
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["imagen"]["name"]);
$extension = end($temp);
$nombre = $_FILES["imagen"]["name"]; 
$categoria = $_POST["categoria"];
$titulo = $_POST["titulo"];

//Query
$query = "INSERT INTO imagen(imagen_titulo,imagen_nombre, imagen_seccion, 
    imagen_impresion, imagen_voto_negativo, imagen_voto_positivo,imagen_fecha_subida,
    imagen_fecha_moderada,imagen_estado)
    VALUES ('".$titulo."','".$nombre."','".$categoria."', 0, 0, 0, now(),'0000-00-00', 'PENDIENTE')";


//Ejecutamos query
//$result = mysqli_query($conexion, $query);
$result = mysqli_query($con,$query);

//echo var_dump($result);

if ((($_FILES["imagen"]["type"] == "image/gif")
|| ($_FILES["imagen"]["type"] == "image/jpeg")
|| ($_FILES["imagen"]["type"] == "image/jpg")
|| ($_FILES["imagen"]["type"] == "image/pjpeg")
|| ($_FILES["imagen"]["type"] == "image/x-png")
|| ($_FILES["imagen"]["type"] == "image/png"))
&& ($_FILES["imagen"]["size"] < 400000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["imagen"]["error"] > 0) {
    //echo "Return Code: " . $_FILES["imagen"]["error"] . "<br>";
  } else {
    //echo "Upload: " . $_FILES["imagen"]["name"] . "<br>";
    //echo "Type: " . $_FILES["imagen"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["imagen"]["size"] / 1024) . " kB<br>";
    //echo "Temp file: " . $_FILES["imagen"]["tmp_name"] . "<br>";
    if (file_exists("posts/". $categoria ."/". $_FILES["imagen"]["name"])) {
      //echo $_FILES["imagen"]["name"] . " ya existe. ";
    } else {
      move_uploaded_file($_FILES["imagen"]["tmp_name"],
      "../posts/". $categoria ."/". $_FILES["imagen"]["name"]);
      //echo "alert('Imagen subida, gracias por tu post.')";
    }
  }
} else {
  //echo 'alert("Archivo inválido, verifique que el tamaño de la imagen sea menor a 400kB.</br>
  //Formatos permitidos .jpg, .jpeg, .png y .gif")';
}
?>
<script>
  document.location = "../index.php";
</script>