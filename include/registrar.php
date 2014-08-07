
      <form id="registrarse" method="post" action="crear_cuenta();">
        
	   <table>
	   	<tr>
	   		<td>Nombre:</td>
	   		<td><input type="text" id="nombre_usuario" name="nombre_usuario" required="required" maxlength="20" pattern="[a-zA-Z0-9._-]+"/></td>
	   	</tr>
	   	<tr>
	   		<td>Contraseña:</td>
	   		<td><input type="password" id="password" name="password" required="required"/></td>
	   	</tr>
	   	<tr>
	   		<td>Confirmación:</td>
	   		<td><input type="password" name="confirmar_password" required="required" /></td>
	   	</tr>
	   	<tr>
	   		<td>Correo:</td>
	   		<td><input type="email" name="correo_electronico" required="required" maxlength="50" placeholder="name@example.com" /></td>
	   	</tr>
	   	<tr>
	   		<td>Edad:</td>
	   		<td><input type="number" name="edad" required="required" min="13" max="50" /></td>
	   	</tr>
	   </table>
		<!--Captcha loco-->
        <?php
          require_once('recaptchalib.php');
          $publickey = "6LeeM_QSAAAAAI8Fm1XmBSZE82U3TjCxnuoABcce"; 
          echo recaptcha_get_html($publickey);
        ?>
        <input type="submit" value="REGISTRARSE" onclick="crear_cuenta(event);" />
      </form>
