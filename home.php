<?php session_start(); ?>
<?php
	if (isset($_SESSION['nombre'])) {
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
			<h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
			<a href="logOut.php">Salir</a>
			</script>
		</div>
	</body>
</html>
<?php
	}else{
		header('Location: index.php');
	}
?>