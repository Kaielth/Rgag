<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["imagen"]["name"]);
$extension = end($temp);
$categoria = $_POST["categoria"];
$titulo = $_POST["titulo"];
if ((($_FILES["imagen"]["type"] == "image/gif")
|| ($_FILES["imagen"]["type"] == "image/jpeg")
|| ($_FILES["imagen"]["type"] == "image/jpg")
|| ($_FILES["imagen"]["type"] == "image/pjpeg")
|| ($_FILES["imagen"]["type"] == "image/x-png")
|| ($_FILES["imagen"]["type"] == "image/png"))
&& ($_FILES["imagen"]["size"] < 400000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["imagen"]["error"] > 0) {
    echo "Return Code: " . $_FILES["imagen"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["imagen"]["name"] . "<br>";
    echo "Type: " . $_FILES["imagen"]["type"] . "<br>";
    echo "Size: " . ($_FILES["imagen"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["imagen"]["tmp_name"] . "<br>";
    if (file_exists("posts/". $categoria ."/". $_FILES["imagen"]["name"])) {
      echo $_FILES["imagen"]["name"] . " ya existe. ";
    } else {
      move_uploaded_file($_FILES["imagen"]["tmp_name"],
      "posts/". $categoria ."/". $_FILES["imagen"]["name"]);
      echo "Imagen subida, gracias por tu post.";
    }
  }
} else {
  echo "Archivo inválido, verifique que el tamaño de la imagen sea menor a 400kB.</br>
  Formatos permitidos .jpg, .jpeg, .png y .gif.";
}
?>
