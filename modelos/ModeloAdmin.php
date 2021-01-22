<?php
require_once "conexionBD.php"; 
class ModeloAdmin extends ConexionBd{
	static public function ingresar($datos, $tablaBd){
		$pdo = ConexionBd::conectar()->prepare("SELECT usuario, password FROM
												 $tablaBd WHERE 
												 usuario = :usuario");
		$pdo -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$pdo -> execute();
		return $pdo -> fetch();
		$pdo -> close();
	}
}
?>
