




<div id="wrap">
<br><br>
	<form id="contactForm">
                <label for="email">Rellene este formulario para ponerse en contacto con nosotros.</label>
                <br><br>
		<label for="email">Tu Email:</label>
		<input type="email" id="email" name="email" placeholder="Ingrese su correo.">
		<label for="nombre">Tu Nombre:</label>
		<input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre.">
		<label for="asunto">Asunto:</label>
		<input type="text" id="asunto" name="asunto" placeholder="Breve descripción del mensaje">
		<label for="descripcion">Descripción del mensaje:</label>
		<span class="caracteres">Tamaño máximo 500 letras</span>
		<textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Escriba el mensaje detalladamente. 
Le responderemos al email de contacto lo antes posible."></textarea>
		<div id="comprueba">
			<p>Comprobación Anti Spam: </p>
			<input type="text" id="n1" name="n1" readonly> + <input type="text" id="n2" name="n2" readonly>
			=
			<input type="text" id="res" name="res" maxlength="2">
		</div>
		<input type="submit" id="enviar" value="Enviar">
		<div style="clear:both"></div>
		<div id="respuesta"></div>
	</form>
</div>    


