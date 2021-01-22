<?php
session_start();
if(!$_SESSION["Ingreso"]){
	header("location:../index.php");
}
require_once "../controladores/ControladorProductos.php";
require_once "../Modelos/ModeloProducto.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Orquidea: productos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                        <span class="btn btn-info">Floreria Orquidea</span>
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="contenido.php">Registrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productos.php">Listas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="salir.php">Cerrar Sesion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
<section>
	<div align="center">
	<br>
	<h1>Lista Productos</h1>
	<br>
	<a href="contenido.php"><button class="btn btn-success">Agregar nuevo</button></a>
	<br>
	<table id="t1"  class='table'>
		<thead>
			<tr>
				<th scope='col' style='background-color:#9ED7D7' colspan="1">Nombre</th>
				<th scope='col' style='background-color:#9ED7D7' colspan="1">Precio Unitario</th>
				<th scope='col' style='background-color:#9ED7D7' colspan="1">Cantidad</th>		
				<th scope='col' style='background-color:#9ED7D7' colspan="1">Proveedor</th>
				<th scope='col' style='background-color:#9ED7D7' colspan="1">Empleado</th>
				<th scope='col' style='background-color:#9ED7D7' >Opcion</th>
				<th scope='col' style='background-color:#9ED7D7' >Opcion</th>
			</tr>
		</thead>
		<tbody >
			<?php
				$mostrar = new ControladorProductos();
				$mostrar -> mostrar();
			?>
		</tbody>
	</table>
  </section>
  </div>
</body>

</html>

