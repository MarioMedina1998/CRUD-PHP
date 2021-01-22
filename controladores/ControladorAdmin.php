<?php
class ControladorAdmin{
	public function ingresar(){
		if(isset($_POST["usuario"])){
			$datos = array("usuario"=>$_POST["usuario"], "password"=>$_POST["password"]);
			$tablaBd = "admins";
			$respuesta = ModeloAdmin::ingresar($datos, $tablaBd);// Esto viene de la bd.
			if($respuesta["usuario"] == $_POST["usuario"]
				&& $respuesta["password"] == $_POST["password"]){
				session_start();
				$_SESSION["Ingreso"] = true;
				header("location: vistas/contenido.php");
			}else{
				echo "Datos no válidos";
			}
		}
	}
}
?>