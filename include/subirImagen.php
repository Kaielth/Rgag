
<form id='subirimagen' action="include/guardarImagen.php" method="post"
	enctype="multipart/form-data">
	<label for="imagen">Imagen:</label>
	<input type="file" id='imagen' name="imagen"><br><br>
	<label for="titulo">Título:</label>
	<input type="text" name="titulo" id="titulo"><br><br>
	<label for="categoria">Categoría:</label>
	<select name="categoria" size="1" id="categoria">
		<option value="gif" selected> GIF </option>
		<option value="comic"> COMIC </option>
		<option value="topic"> TOPIC </option>
	</select>
	<br><br>
	<input id='subir' type="submit" name="submit" value="SUBIR IMAGEN" >
</form>