<?php
	session_start();
	if (isset($_SESSION['nombre'])) {
		header('Location: home.php');
	}
?>
<!DOCTYPE html>
<html lang='es'>
	<head>
		<title>Mi Sistema</title>
		<meta charset='UTF-8'>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src='http://code.jquery.com/jquery-latest.js'></script>
	</head>
	<body>
		<div id='content'>
			<h1>Wellcome to Admin Login</h1>
			<form id='FormLogin' method='post' action='procesaLogin.php'>
				<label for='userName'>userName</label><br>
				<input type='text' name='userName' id='userName' placeholder='Usuario...' > For <b>admin</b>) <br><br>
				<label for='password'>password</label><br>
				<input type='password' name='password' id='password' placeholder='Contraseña...' >  (Por defecto <b>admin</b>) <br><br>

				<img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
				<br />
				<object type="application/x-shockwave-flash" data="securimage/securimage_play.swf?audio_file=securimage/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" width="30" height="30">
				<param name="movie" value="/securimage/securimage_play.swf?audio_file=/securimage/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" />
				</object>
				<a href="#" title="Cambiar imagen" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false"><img src="images/Refresh.png" alt='Refresh' /></a>
				<br /><br />
				<label for="captcha_code">Digite el texto de la imagen anterior<br>(No se distinguen mayúsculas y minúsculas) <span class="obligatorio">*</span></label>
				<br />
				<input type="text" name="captcha_code" id="captcha_code" size="10" maxlength="6" title="Ingrese el captcha" AUTOCOMPLETE=OFF />
				<br /><br />

				<div id='message'>Todos los campos son obligatorios</div>
				<input type='submit' value='Entrar' name='Entrar' title='Entrar' class='button'>
			</form>

			<script type="text/javascript">
				$('#FormLogin').submit(function(event){
					event.preventDefault();

					var p_userName	= $('#userName').val();
					var p_password	= $('#password').val();
					var p_captcha_code	= $('#captcha_code').val();

					$.post(
						'procesaLogin.php',{
							userName:		p_userName,
							password: 		p_password,
							captcha_code:	p_captcha_code, 
						},

						function(data){
							$('#message').fadeIn('slow');
							$('#message').html(data);
						}
					);
				});
			</script>
		</div>
	</body>
</html>