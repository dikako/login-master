<?php
	/**
	* @author 	Jonathan Morales Salazar
	* @link 	www.blonder413.com
	*/
	abstract class Conexion{
		protected $dbh;

		public function getConnection(){
			$connect = array(
							'prefix' => 'mysql',
							'server' => 'localhost',
							'dbName' => 'login',
							'userName' => 'root',
							'password' => '',
						);
			try{
				return $this->dbh = new PDO(
										$connect["prefix"] . ":host=" . $connect["server"] . ";dbname=" . $connect["dbName"],
										$connect["userName"],
										$connect["password"],
										array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
									);
			}catch(PDOException $e){
				echo "<script>
						location.href='offline.php';
					</script>";
			}
		}
	}
?>