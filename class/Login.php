<?php
	require_once 'Conexion.php';
	/**
	* @author 	Jonathan Morales Salazar
	* @link 	www.blonder413.com
	*/
	class Login extends Conexion{
		private $connect;

		function __construct(){
			$this->connect = parent::getConnection();
		}

		public function login(){
			//echo "<pre>";print_r($_POST);
			
			//encripto el usuario
			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
			$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
			$key = "My+Clave@";
			$userName1 = MCRYPT_ENCRYPT(MCRYPT_RIJNDAEL_256,$key,$_POST["userName"],MCRYPT_MODE_ECB,$iv);
			$userName = base64_encode($userName1);
			
			//encripto el password
			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
			$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
			$key = "My+Clave@";
			$password1 = MCRYPT_ENCRYPT(MCRYPT_RIJNDAEL_256,$key,$_POST["password"],MCRYPT_MODE_ECB,$iv);
			$password = base64_encode($password1);

			//echo "user: " . $userName . '<br>Password: ' . $password;

			$query = 'SELECT `nombre`, `username`, `password` FROM users WHERE `username` = ? AND `password` = ?;';
			$stmt = $this->connect->prepare($query);
			$stmt->bindParam(1,$userName,PDO::PARAM_STR);
			$stmt->bindParam(2,$password,PDO::PARAM_STR);
			$stmt->execute();

			if ($stmt->rowCount()==0) {
				echo "<span class='bad'>El usuario y/o contraseña son incorrectos</span>";
			}else{
				$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				//echo '<pre>';print_r($data);
				$_SESSION['nombre'] = $data[0]['nombre'];
				echo "<script>
						location.href='home.php';
					</script>";
			}
		}
	}
?>