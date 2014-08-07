<?php

//Llamamos a la conexión
include("conectar.php");
//Verificamos cual rol tiene el usuario e imprimimos un menu y otro
switch($rol_confirmed){
	case "ADMINISTRADOR":
		echo "<a href='#' onclick='adm_usuarios(event);'>USUARIOS</a> ";
		echo "<a href='#' onclick='adm_imagenes(event);'>IMAGENES</a> ";
		echo "<a href='#' onclick='adm_secciones(event);'>SECCIONES</a> ";
		echo "<a href='#' onclick='adm_palabras(event);'>PALABRAS</a> ";
		break;
	case "WEBMASTER":
		
	case "MODOP":
		echo "<a href='#' onclick='moderadores(event);'>MODERADORES</a> ";
	case "MODERADOR":
		echo "<a href='#' onclick='aprobar_imagen(event);'>APROBAR IMAGEN</a> ";
		echo "<a href='#' onclick='ver_usuarios(event);'>VER USUARIOS</a> ";
	case "USUARIO":
		echo "<a href='#' onclick='subir_imagen(event);'>SUBIR IMAGEN</a> ";
	case "VISITANTE":	
		echo "<a href='#' onclick='fresh(event);'>FRESH</a> ";
		echo "<a href='#' onclick='tops(event);'>TOP</a> ";
		echo "<a href='#' onclick='gif(event);'>GIF</a> ";
		echo "<a href='#' onclick='comic(event);'>COMIC</a> ";
		echo "<a href='#' onclick='topic(event);'>TOPIC</a> ";
}

?>