<?php
class ConexionBd{
	static public function conectar(){
		try{
			$bd = new PDO("mysql:host=localhost;dbname=orquidea","root","");
			return $bd;
		}catch(PDOException $e){
			echo 'Error al conectarse con la base de datos: ' . $e->getMessage();
    		exit;
		}	
	}
}
?>