<?php
	//echo '<pre>';print_r($_POST);exit;
	include_once 'securimage/securimage.php';
	$securimage = new Securimage();

	if(empty($_POST['userName'])){
		echo "<span class='bad'>Ingrese su usuario</span>";
		echo "<script>
				document.getElementById('userName').focus();
			</script>";
	}elseif(empty($_POST['password'])){
		echo "<span class='bad'>Ingrese su password</span>";
		echo "<script>
				document.getElementById('password').focus();
			</script>";
	}elseif(empty($_POST['captcha_code'])){
		echo "<span class='bad'>Ingrese el captcha</span>";
		echo "<script>
				document.getElementById('captcha_code').focus();
			</script>";
	}elseif ($securimage->check($_POST['captcha_code']) == false) {
		// the code was incorrect
		// you should handle the error so that the form processor doesn't continue
		echo "<span class='bad'>El código ingresado es incorrecto</span>";
		echo "<script>
				document.getElementById('captcha_code').focus();
			</script>";
	}else{
		require_once 'class/Login.php';
		$obj_login = new Login();
		$obj_login->login();
	}
?>