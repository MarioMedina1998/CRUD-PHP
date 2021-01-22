<?php
session_start();
if(!$_SESSION["Ingreso"]){
	header("location: ../index.php");
}
require_once "../controladores/ControladorProductos.php";
require_once "../Modelos/ModeloProducto.php";

$eliminar = new ControladorProductos();
$eliminar -> eliminarProducto();
?>

	

