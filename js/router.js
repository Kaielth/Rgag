/*
Este archivo contiene todos los métodos javascript que llaman y
pasan los valores a los métodos Ajax(); y AjaxF();, 
consiste en enlazar los formularios y acciones/scripts 
con su respectivo archivo php.
*/
function conectar(){
	//Datos para la solicitud Ajax
	var archivo = "conectar.php";
	var data = "";
	var resultado = document.getElementById("PERFIL");
	//Recopilamos y construimos la información
	var nombre_usuario = document.getElementsByName("nombre_usuario")[0].value;
	var password = document.getElementsByName("password")[0].value;
	data = "nombre_usuario="+nombre_usuario+"&password="+password;
	//Solicitud ajax
	Ajax(archivo, data, resultado, function(){});
}
function desconectarse(){
	//Datos para la solicitud Ajax
	var archivo = "desconectar.php";
	var data = "";
	var resultado = document.getElementById("N/A");
	//Solicitud ajax	
	Ajax(archivo, data, resultado, function(){location.reload();});
}
function registrarse(e){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "registrar.php";
	var data = "";
	var resultado = document.getElementById("contenido");
	//Solicitud ajax
	Ajax(archivo, data, resultado,function(){});
}
function ver_perfil(e){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "verPerfil.php";
	var data = "";
	var resultado = document.getElementById("CONTENIDO");
	//Recopilamos y construimos la información
	var nombre_usuario = document.getElementsByName("nombre_usuario")[0].value;
	data = "nombre_usuario="+nombre_usuario;
	//Solicitud ajax
	Ajax(archivo, data, resultado);
}
function crear_cuenta(e){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "crearCuenta.php";
	var data = "";
	var resultado = document.getElementById("n/a");
	//Recopilamos y construimos la información
	var nombre_usuario = document.getElementById("nombre_usuario").value;
	var password = document.getElementById("password").value;
	var correo = document.getElementsByName("correo_electronico")[0].value;
	var edad = document.getElementsByName("edad")[0].value;
	data = "nombre_usuario="+nombre_usuario+
			"&password="+password+
			"&correo="+correo+
			"&edad="+edad;
	//Solicitud ajax
	Ajax(archivo, data, resultado,function()
		{
			alert("Cuenta creada con exito. Ya puedes conectarte a Rgag");
			location.reload();
		});
}
function borrar_imagen(e, imagen_id){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "borrarImagen.php";
	var data = "";
	var resultado = document.getElementById("footer");
	//Recopilamos y construimos la información
	var imagen_id = imagen_id;
	data = "imagen_id="+imagen_id;
	//Solicitud ajax
	Ajax(archivo, data, resultado, function()
	{
		alert("Imagen borrada con exito.");
		location.reload();
	});
}
function guardar_imagen(e){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "guardarImagen.php";
	var data = "";
	var resultado = document.getElementById("contenido");
	//Recopilamos y construimos la información
	var file = document.getElementById("imagen");
	var categoria = document.getElementsByName("categoria")[0].value;
	var titulo = document.getElementsByName("titulo")[0].value;
	data = "categoria="+categoria+
			"&titulo="+titulo;
	//Solicitud ajax
	AjaxF(archivo, file, data, resultado, function(){});
}
function votar(e, voto_valor, imagen_id){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "votar.php";
	var data = "";
	var resultado = document.getElementById("footer");
	//Construimos la información
	data = "voto_valor="+voto_valor+
			"&imagen_id="+imagen_id;
	//Solicitud Ajax
	Ajax(archivo, data, resultado, function(){location.reload();});
}
function adm_imagenes(){
	//No recargamos la pag
	//e.preventDefault();
	var archivo = "admImagenes.php";
	var data = "";
	var resultado = document.getElementById("contenido");	
	//Solicitud Ajax
	Ajax(archivo, data, resultado, function(){});
}
function adm_secciones(e){
	//No recargamos la pag
	e.preventDefault();
	var archivo = "admSecciones.php";
	var data = "";
	var resultado = document.getElementById("contenido");	
	//Solicitud Ajax
	Ajax(archivo, data, resultado, function(){});
}
function adm_palabras(e){
	//No recargamos la pag
	e.preventDefault();
	var archivo = "admPalabras.php";
	var data = "";
	var resultado = document.getElementById("contenido");	
	//Solicitud Ajax
	Ajax(archivo, data, resultado, function(){});
}
function adm_usuarios(e){
	//No recargamos la pag
	e.preventDefault();
	var archivo = "admUsuarios.php";
	var data = "";
	var resultado = document.getElementById("contenido");	
	//Solicitud Ajax
	Ajax(archivo, data, resultado, function(){});
}
function moderadores(e){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "verModeradores.php";
	var data = "";
	var resultado = document.getElementById("contenido");
	//Solicitud AJAX
	Ajax(archivo, data, resultado, function(){});
}
function crear_moderador(e,mod_id,usuario_id){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "crearModerador.php";
	if(mod_id == 1)
		mod_type = "MODERADOR";
	else if(mod_id == 2)
		mod_type = "MODOP";
	else
		mod_type = "USUARIO";
	var data = "mod_type="+mod_type+
				"&usuario_id="+usuario_id;
	var resultado = document.getElementById("footer");
	//Solicitud AJAX
	Ajax(archivo, data, resultado, function()
	{
		var resultado = document.getElementById("contenido");
		//Solicitud AJAX
		Ajax("verModeradores.php", "", resultado, function(){});
	});
}
function aprobar_imagen(e){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "moderarImagen.php";
	var data = "";
	var resultado = document.getElementById("contenido");
	//Solicitud AJAX
	Ajax(archivo, data, resultado, function(){});
}
function sobornar(e,imagen_id){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "aprobarImagen.php";
	var data = "imagen_id="+imagen_id;
	var resultado = document.getElementById("N/A");
	//Solicitud AJAX
	Ajax(archivo, data, resultado, function()
		{
			alert("La imagen ha sido sobornada");
			location.reload();
		});
}
function ver_usuarios(e){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "verUsuarios.php";
	var data = "";
	var resultado = document.getElementById("contenido");
	//Solicitud AJAX
	Ajax(archivo, data, resultado, function(){});
}
function ver_usuario(e, nombre_usuario){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "verUsuario.php";
	var data = "";
	var resultado = document.getElementById("contenido");
	//Construimos los datos
	data = "nombre_usuario="+nombre_usuario;
	//Solicitud AJAX	
	Ajax(archivo, data, resultado, function(){});
}
function subir_imagen(e){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "subirImagen.php";
	var data = "";
	var resultado = document.getElementById("contenido");
	//Solicitud AJAX
	Ajax(archivo, data, resultado, function(){});
}
function timagen(e, categoria){
	//No recargamos la pag
	e.preventDefault();
	//Mostramos las imagenes
	init(categoria);
}
function init(categoria){
	//Datos para la solicitud Ajax
	var archivo = "mostrarImagen.php";
	var data = "";
	var resultado = document.getElementById("contenido");
	document.getElementById("contenido").innerHTML = "";
	//Recopilamos y construimos la información
	var n_posts = 20;
	var categoria = categoria;
	globalCategoria = categoria;
	data = "categoria="+categoria+"&n_posts="+n_posts;
	//Solicitud Ajax
	Ajax(archivo, data, resultado,function(){});
}
var globalCategoria = "topic";
function fresh(e){
	timagen(e,"fresh");
}
function tops(e){
	timagen(e,"top");
}
function gif(e){
	timagen(e,"gif");
}
function comic(e){
	timagen(e,"comic");
}
function topic(e){
	timagen(e,"topic");
}

function comentar(e, nombre_usuario){
	//No recargamos la pag
	e.preventDefault();
	//Datos para la solicitud Ajax
	var archivo = "comentar.php";
	var data = "";
	var resultado = document.getElementById("n/a");
	//Recopilamos y construimos la información
	var imagen_id = document.getElementById("imagen_id").innerHTML;
	var contenido_comentario = document.getElementById("comentario_nuevo").value;
	data = "imagen_id="+imagen_id+"&contenido_comentario="+contenido_comentario+"&nombre_usuario="+nombre_usuario;
	//Solicitud AJAX
	Ajax(archivo, data, resultado,function(){location.reload();});
}
function comentarios(e, id){
	//Evitamos que recargue la página
	e.preventDefault();
	//Recolectamos la información
	var archivo = "comentarios.php";
	var data = "imagen_id=" + id + "&categoria=" + globalCategoria;
	var resultado = document.getElementById("contenido");	
	Ajax(archivo, data, resultado, function()
		{
			document.title = "Rgag " + id;			
		});
}
function borrar_comentario(e, id){
	//Evitamos que recargue la página
	e.preventDefault();
	//Recolectamos la información
	var archivo = "borrarComentario.php";
	var data = "comentario_id=" + id;
	var resultado = document.getElementById("footer");
	Ajax(archivo, data, resultado, function()
		{
			alert("Comentario borrado con exito.");
			location.reload();
		});
}
function borrar_usuario(e, nombre_usuario){
	//Evitamos que recargue la página
	e.preventDefault();
	//Recolectamos la información
	var archivo = "borrarUsuario.php";
	var data = "nombre_usuario=" + nombre_usuario;
	var resultado = document.getElementById("footer");
	Ajax(archivo, data, resultado, function()
		{
			alert("Usuario borrado con exito.");
			location.reload();
		});
}
function cambiar_status_usuario(e, nombre_usuario, new_status){
	//Evitamos que recargue la página
	e.preventDefault();
	//Recolectamos la información
	var archivo = "cambiarStatus.php";
	var data = "nombre_usuario=" + nombre_usuario +
				"&usuario_status=" + new_status;
	var resultado = document.getElementById("footer");
	Ajax(archivo, data, resultado, function()
		{
			alert("Usuario modificado con exito.");
			//location.reload();
		});
}
function aprobar(e, nombre_usuario, imagen_id){
	e.preventDefault();
	var archivo = "votarModeracion.php";
	var data = "nombre_usuario=" + nombre_usuario 
			+ "&imagen_id=" + imagen_id + "&voto_tipo='APROBADA'";
	var resultado = document.getElementById("n/a");
	Ajax(archivo, data, resultado,function(){
		location.reload();
	});
}
function desaprobar(e, nombre_usuario, imagen_id){
	e.preventDefault();
	var archivo = "votarModeracion.php";
	var data = "nombre_usuario=" + nombre_usuario 
			+ "&imagen_id=" + imagen_id + "&voto_tipo='DESAPROBADA'";
	var resultado = document.getElementById("n/a");
	Ajax(archivo, data, resultado,function()
	{
		location.reload();
	});
}
function aprobado(e, imagen_id){
	e.preventDefault();
	var archivo = "aprobarImagen.php";
	var data = "imagen_id" + imagen_id;
	var resultado = document.getElementById("N/A");
	Ajax(archivo, data, resultado);
}